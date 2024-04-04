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
        $fileName = uniqid().$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public',$fileName);
        $data['image'] = $fileName;
       //dd($request->all());
       try{
        Product::create($data);
        return redirect()->route('product#list')->with(['message'=>'Product created!']);
       }catch(Exception $e){
            return redirect()->back()->withInput()->withErrors(['error'=>$e->getMessage()]);
       }
    }

    //product list page
    public function list(){
        $products = Product::when(request('key'),function($query){
            $query->where('name','like','%'.request('key').'%');
        })->
        orderBy('id','desc')->paginate(4);
        return view('admin.products.list',compact('products'));
    }
}
