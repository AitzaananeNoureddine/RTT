<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;

class CategoryController extends Controller
{
    public function index($id){

        $articles=Article::where('Category','=',$id)->get();
        return view('articles')->with('articles',$articles);
    }

   public function fetch(){
        
        return view('articles')->with("cat_name",$_GET['cat_name']);
    }
}
