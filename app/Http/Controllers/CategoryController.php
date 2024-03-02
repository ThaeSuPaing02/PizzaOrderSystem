<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //show category list page
    public function list(){
        $categories = Category::all();
        return view('admin.category.list',compact('categories'));
    }
    
    //show create page
    public function createPage(){
        return view('admin.category.createPage');
    }

    //create category 
    public function create(Request $request){
       // dd($request->all());
       Category::create($request->all());
       return redirect()->route('category#list')->with(['message'=>'Category created!']);
    }

    //show edit page
    public function editPage($id){
        $category = Category::where('id',$id)->first();
        return view('admin.category.editPage',compact('category'));
    }

    //edit category
    public function edit(Request $request){
       // dd($id);
       Category::where('id',$request->id)->update(['name'=>$request->name]);
       return redirect()->route('category#list')->with(['message'=>'Category Edited!']);
    }

    //delete category
    public function delete($id){
        Category::destroy($id);
        return redirect()->route('category#list')->with(['message'=>'Category Deleted!']);
    }

}
