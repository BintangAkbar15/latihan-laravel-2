<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $max_tampil = 5;
        if(request("search")){
            $data = Product::where('title','like','%'.request("search").'%')->paginate($max_tampil)->withQueryString();
        }
        else{
            $data = Product::orderBy('created_at','asc')->paginate($max_tampil)->withQueryString();
        }
        return view('products.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'title' => 'required|min:3',
            'desc' => 'required|min:20',
            'price' => 'required|min:4',
            'stock' => 'required|min:1',
            'thumb' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]); 
        $validate['thumb'] = $request->file('thumb')->store('product-images');

        $data = [
            'thumb'=>$validate['thumb'],
            'title'=>$validate['title'],
            'desc'=>$validate['desc'],
            'price'=>$validate['price'],
            'stock'=>$validate['stock'],
        ];
        Product::create($data);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
                $validate = $request->validate([
            'title' => 'required|min:3',
            'desc' => 'required|min:20',
            'price' => 'required|min:4',
            'stock' => 'required|min:1',
            'thumb' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]); 
        
        if($request->hasFile('thumb')){
            Storage::delete('public/'.$request->thumb);
            $validate['thumb'] = $request->file('thumb')->store('product-images');
        }

        
        Product::where('id',$id)->update($validate);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Product::where('id',$id)->delete();
        return redirect('/');
    }
}
