<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //create page
    public function createPage(){
        $categories = Category::get();
        return view('admin.products.create',compact('categories'));
    }
}
