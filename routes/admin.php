<?php
use App\Http\Controllers\WebController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;

Router::get('/categories',[\App\Http\Controllers\CategoryController::class,"all"]);
Router::get('/categories/new',[\App\Http\Controllers\CategoryController::class,"form"]);
Router::post('/categories/save',[\App\Http\Controllers\CategoryController::class,"save"]);
Router::get('/categories/remove/{id}',[\App\Http\Controllers\CategoryController::class,"delete"]);
Router::get('/categories/edit/{id}',[\App\Http\Controllers\CategoryController::class,"edit"]);
Router::post('/categories/update/{id}',[\App\Http\Controllers\CategoryController::class,"update"]);

Router::get('/products',[\App\Http\Controllers\ProductsController::class,"all"]);
Router::get('/products/new',[\App\Http\Controllers\ProductsController::class,"form"]);
Router::post('/products/save',[\App\Http\Controllers\ProductsController::class,"save"]);
Router::post('/products/remove/{id}',[\App\Http\Controllers\ProductsController::class,"delete"]);
Router::post('/products/edit/{id}',[\App\Http\Controllers\ProductsController::class,"edit"]);
Router::post('/products/update/{id}',[\App\Http\Controllers\ProductsController::class,"update"]);
