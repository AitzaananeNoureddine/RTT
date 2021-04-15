<?php

namespace App\Http\Controllers;

use App\Events\NewPost;
use App\Models\Article;
use App\Models\Post;
use App\Models\Reply;
use DateTime;
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
        event(new NewPost($html));
        return response()->json(array('html'=>$html));
    }

    public function InsertReply(Request $request){
        $reply = new Reply;
        $reply->Post = $request->Post;
        $reply->Content = $request->Content;
        $reply->save();
        $posts = Post::where('Article',$request->Article)->get();
        $html = view('partial.discussion',['posts'=>$posts, 'articleId'=>$request->Article])->render();
        event(new NewPost($html));
        return response()->json(array('html'=>$html));
    }

    static public function timeAgo($dateTime){
        echo 'posted ';
        $diff = $dateTime->diff(new DateTime('NOW'));
        $years = $diff->format('%Y');
        $days = $diff->format('%D');
        $hours = $diff->format('%H');
        $minutes = $diff->format('%I');
        $seconds = $diff->format('%S');
        if($years != 0) echo $years.' years';
        else{
            if($days != 0) echo $days.' days';
            else{
                if($hours != 0) echo $hours.' hours';
                else{
                    if($minutes != 0) echo $minutes.' minutes';
                    else{
                        echo $seconds.' seconds';
                    }
                }
            }
        }
        echo ' ago';
    }
}
