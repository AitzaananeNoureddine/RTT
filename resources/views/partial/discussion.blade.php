@foreach ($posts as $post)
<div class="msgContainer">
    <div id="replyNote">Click to submit reply</div>
    <div class="post" onclick="reply({{ $post->Id }},{{ $articleId }})">
        <div style="font-family: 'Caveat', cursive;">
            @php
                App\Http\Controllers\PostController::timeAgo($post->created_at);
            @endphp
        </div>{{ $post->Content }}
    </div>
</div>
@php
    $replies = App\Models\Reply::where('Post',$post->Id)->get();
@endphp
@foreach ($replies as $reply)
<div class="msgContainer">
    <div class="reply">
        <div style="font-family: 'Caveat', cursive;">
            @php
                App\Http\Controllers\PostController::timeAgo($reply->created_at);
            @endphp
        </div>{{ $reply->Content }}
    </div>
</div>
@endforeach
@endforeach