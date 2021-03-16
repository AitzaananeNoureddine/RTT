<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index(){
        $scores = Score::orderBy('Value','DESC')->get();
        return view('top10')->with('scores',$scores);
    }
}
