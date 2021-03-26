<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ArticleController extends Controller
{
    public function random(){
        $articles = Article::all();
        $firstId = $articles[0]->Id;
        $lastId = $articles[count($articles)- 1]->Id;
        $randId = rand($firstId,$lastId);
        while($randId == null) $randId = rand($firstId,$lastId);
        $article = Article::where('Id',$randId)->first();
        return view('typingTest')->with('article',$article);
    }
    
    public function fetchArticle(Request $request){
        $article = Article::where('Id',$request->article_id)->first();
        return view('typingTest')->with('article',$article);
    }
}
