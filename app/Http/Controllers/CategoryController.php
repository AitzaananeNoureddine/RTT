<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    public function index(){
        $var=Category::all();
        return view('home')->with('variable',$var);
    }
}
