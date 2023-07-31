<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function product(){
        return view('admin.product.add-product');

    }

    function imageProcess($request){
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $imageUrl = "product-images/";
        $image->move($imageUrl, $imageName);
        return $imageUrl.$imageName;

    }

    public function store(Request $request){
        $product = new Product();
        $product->title = $request->title;
        $product->price = $request->price;
        $product->offer = $request->offer;
        $product->image = $this->imageProcess($request);
        $product->save();
        return back()->with('notification' , 'product added successfully');
    }

    public function index(){
        $products = Product::latest()->get();
        return view('admin.product.manage-product', compact('products'));
    }

    public function edit($id){
        $product = Product::find($id);
        return view('admin.product.edit-product' , compact('product'));
    }

    public function update(Request $request, $id){
        $product = Product::find($id);
        $product->title = $request->title;
        $product->price = $request->price;
        $product->offer = $request->offer;
        if($request->image){
            if(file_exists($product->image)){
                unlink($product->image);
            }
            $product->image = $this->imageProcess($request);
        }
        $product->save();
        return back()->with('notification', 'Product has been Updated');
    }

    public function delete($id){
        $product = Product::find($id);
        if(file_exists($product->image)){
                unlink($product->image);
            }
        $product->delete();
        return back()->with('notification', 'Product has been deleted');
    }
}
