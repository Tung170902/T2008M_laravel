<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        "name",
        "image",
        "des",
        "price",
        "qty",
        "category_id",
    ];
    public function Category(){
        return $this->belongsTo(Category::class);
    }
    public function getImage(){
        if($this->image){
            return asset("upload/".$this->image);
        }
        return asset("upload/defaut.img");
    }
}
