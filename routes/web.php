<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/',[ProductController::class,'index'])->name(name: 'product') ;
Route::post('/',[ProductController::class,'store'])->name('product.post') ;
Route::put('/{id}',[ProductController::class,'update'])->name('product.update') ;
Route::delete('/del/{id}',[ProductController::class,'destroy'])->name('product.delete') ;

Route::get('/add', function(){
    return view('products.add');
});

Route::get('/edit/{product:title}', function(Product $product){
    $query = Product::find($product['id']);
    return view('products.edit',['title'=>$product['id'],'posts'=>$query]);
});