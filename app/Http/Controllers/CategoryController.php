<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        return view('categories');
    }

    public function fetch(){
        // return $_GET['cat_name'];
        return view('articles')->with("cat_name",$_GET['cat_name']);
    }
}
