<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    protected $updateValue;

    public function index(){
        $scores = Score::orderBy('Value','DESC')->get();
        return view('top10')->with('scores',$scores);
    }

    public function verifyScore(Request $request){
        $scores = Score::orderBy('Value','ASC')->get();
        if(count($scores) == 10){
            for($i = 0;$i<count($scores);$i++){
                if($request->score > $scores[$i]->Value) return response()->json([ 'msg'=>'username' ,'updateValue'=>$scores[$i]->Value]);
            }
        }
        else{
            return response()->json([ 'msg'=>'username']);
        }
        return response()->json([ 'msg'=>'not this time']);
    }

    public function updateUser(Request $request){
        if($request->updateValue != 'undefined'){
            Score::where('Value',$request->updateValue)
             ->take(1)
             ->update(['Value'=>$request->hiddenScore,'Username'=>$request->username]);
        }
        else{
            $score = new Score;
            $score->Value = $request->hiddenScore;
            $score->Username = $request->username;
            $score->save();
        }
    }
}
