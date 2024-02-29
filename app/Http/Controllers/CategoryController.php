<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //show category list page
    public function list(){
        return view('admin.category.list');
    }
}
