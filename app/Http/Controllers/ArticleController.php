<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Post;
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
        $posts = Post::where('Article',$randId)->get();
        return view('typingTest',['article'=>$article, 'posts'=>$posts]);
    }
    
    public function fetchArticle(Request $request){
        $article = Article::where('Id',$request->article_id)->first();
        $posts = Post::where('Article',$request->article_id)->get();
        return view('typingTest',['article'=>$article, 'posts'=>$posts]);
    }
}
