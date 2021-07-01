<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function all(){
//        $products = DB::table("products")->get();
//        $products = Product::all();
//        $products = Product::leftJoin("categories","categories.id","=","products.category_id")
//            ->select("product.*","categories.name as category_name")->get();
        $products = Product::with("Category")
            ->orderBy("price","asc")
//            ->limit(1)
//            ->skip(1)
            ->where("price",">","500")
            ->where("name","LIKE","%thinh%")
            ->get();


        return view("product.table",[
            "products"=>$products
            ]);
    }
    public function form(){
        $categories = Category::all();
        return view("product.form",[
            "categories"=>$categories
        ]);
    }

    public function save(Request $request){
        $request->validate([
           "name"=>"required",
           //"image"=>"required",
           "price"=>"required|min:0",
           "qty"=>"required|min:0",
           "category_id"=>"required|numeric|min:1",
        ],[
            "name.required"=>"Vui long nhap ten",
            "category_id.min"=>"Vui long chon danh muc",
        ]);

        //upload file
        $image = null;

        if($request->has("image")){
            $file = $request->file("image");
            //$fileName = $file -> getClientOriginalName(); //lay ten file
            $extName = $file->getClientOriginalExtension(); //lay duoi file
            $fileName = time().".".$extName;
            $fileSize = $file->getSize();
            $allow = ["png","jpeg","jpg","gif"]; //nhung file dc up len
            if(in_array($extName,$allow)){
                if($fileSize < 100000000){
                    try{
                        $file->move("upload",$fileName);
                        $image = $fileName;
                    }catch (\Exception $e){

                    }
                }
            }
        }

        try {
            Product::create([
                "name"=>$request->get("name"),
                "image"=>$request->get("image"),
                "des"=>$request->get("des"),
                "price"=>$request->get("price"),
                "qty"=>$request->get("qty"),
                "category_id"=>$request->get("category_id"),
            ]);
        }catch (\Exception $e){
            return  $e;
        }
        return redirect()->to("products");
    }
    public function delete($id){
        DB::table("products")->where("id",$id)->delete();
        return redirect()->to("products");
    }
    public function edit($id){
//        $cat = DB::table("categories")->where("id",$id)->first();
//        if($cat == null) return redirect()->to("categories");
        $item = Product::findOrFail($id);
        return view("product.edit",[
            "item"=>$item
        ]);
    }

    public function update(Request $request,$id){
//        $cat = DB::table("categories")->where("id",$id)->first();
//        if($cat == null) return redirect()->to("categories");
//        DB::table("categories")->where("id",$id)->update([
//            "name"=>$request->get("name"),
//            "updated_at"=>Carbon::now()
//        ]);
        $item = Product::findOrFail($id);
        $item->update([
            "name"=>$request->get("name")
        ]);
        return redirect()->to("products");
    }
}
