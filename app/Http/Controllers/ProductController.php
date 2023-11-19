<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function all(){
        $products=Product::all();
        return view('admin.allproducts',compact("products"));
    }

    public function show($id){
        $category=Category::all();
        $product=Product::findOrFail($id);
        return view("admin.show",compact("product","category"));
    }


    public function create(){
        $categories = Category::all();
        return view("admin.create",compact("categories"));
    }

    public function store(Request $request){
        $data = $request->validate([
            "name"=>"required|string|max:255",
            "desc"=>"required|string|",
            "price"=>"required|numeric",
            "image" => 'required|image|mimes:jpeg,jpg,png',
            "quantity"=>"required|numeric",
            "category_id"=>"required|exists:categories,id"
        ]);

        $data['image']= Storage::putFile("products",$data['image']);

        Product::create($data);
        return redirect("create")->with('success',"data inserted successfuly");
    }

    public function edit($id){
     $product=   Product::findOrFail($id);
     $categories= Category::all();
        return view("admin.edit",compact("product","categories"));
    }

    public function update(Request $request , $id){
        $product=  Product::findorFail($id);
        $data = $request->validate([
            "name"=>"required|string|max:255",
            "desc"=>"required|string|",
            "price"=>"required|numeric",
            "image" => "image|mimes:jpeg,jpg,png",
            "quantity"=>"required|numeric",
            "category_id"=>"required|exists:categories,id"

        ]);

        if ($request->has("image")) {
            Storage::delete($product->image);
        $data['image']= Storage::putFile("products",$data['image']);
        }
        $product->update($data);
        return redirect(url("products/show/$id"))->with('success',"data updated successfuly");
    }

    public function delete($id){
        $product= Product::findOrFail($id);
        Storage::delete($product->image);
        $product->delete();
        return redirect(url('allproducts'))->with('error',"data deleted successfuly");
    }

    public function search(Request $request){
        $key=$request->key;
        $products=Product::where("name","like","%$key%")->get();
        $users=User::where("name","like","%$key%")->get();
        return view("admin.home",compact("products","users"));
    }
}
