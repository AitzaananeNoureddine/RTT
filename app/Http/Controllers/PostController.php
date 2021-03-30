<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function Insert(Request $request){
        $post = new Post;
        $post->Article = $request->Article;
        $post->Content = $request->Content;
        $post->save();
        $posts = Post::where('Article',$request->Article)->get();
        $html = view('partial.discussion',['posts'=>$posts, 'articleId'=>$request->Article])->render();
        return response()->json(array('html'=>$html));
    }

    public function InsertReply(Request $request){
        $reply = new Reply;
        $reply->Post = $request->Post;
        $reply->Content = $request->Content;
        $reply->save();
        $posts = Post::where('Article',$request->Article)->get();
        $html = view('partial.discussion',['posts'=>$posts, 'articleId'=>$request->Article])->render();
        return response()->json(array('html'=>$html));
    }
}
