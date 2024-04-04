<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //create page
    public function createPage(){
        $categories = Category::get();
        return view('admin.products.create',compact('categories'));
    }

    public function create(Request $request){
        //dd($request->all());
        $data = $request->validate([
            'name'=>'required|unique:products| max:50',
            'category_id'=>'required',
            'description'=>'required| max: 200',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0|max:1000000'
        ]);
       //dd($request->all());
       try{
        Product::create($data);
        return redirect()->route('product#createPage')->with(['message'=>'Product created!']);
       }catch(Exception $e){
            return redirect()->back()->withInput()->withErrors(['error'=>$e->getMessage()]);
       }
    }
}
