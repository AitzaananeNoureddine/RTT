@extends('partial/master')
@section('content')
    <div class="content content2" style="background-color: #CFC9C9;text-align: center;padding: 11rem 2% 150px 2% !important;">
        <h2 style="color: #230052;font-family: 'Josefin Sans', sans-serif;display: inline;">{{ $article->Title == '' ? "Random typing test":$article->Title }}
        <!-- read button -->
        <button type="button" class="btn btn-primary readB" data-toggle="modal" data-target="#readingModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
            </svg>
        </button>
        </h2><br><br>
        <!-- reading modal -->
        <div class="modal fade" id="readingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered reading-dialog" role="document">
            <div class="modal-content reading-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle" style="font-family: 'Josefin Sans', sans-serif;color: #240046;">" <strong>{{ $article->Title == '' ? "Random typing test":$article->Title }}</strong> "</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body reading-body">
                    <img src="/assets/images/{{ $article->Img }}" class="reading-img" width="50%" height="auto">
                    {{ $article->Content }}
                </div>
            </div>
            </div>
        </div>
        <!-- reading modal -->
        <div contenteditable="false" id="randomTxt" class="form-control">{{ $article->Content }}</div>
        <textarea id="typingArea" rows="1" class="form-control" style="resize: none;" onfocus="this.value = ''" onkeypress="start(event);">start typing...</textarea>
        <button class="resetB" onclick="retryRandom()"><strong>Reset</strong></button>
        <span id="ruler" style="visibility: hidden;white-space: nowrap;"></span>
        <button class="timeB" onclick="PauseContinue()">0 (s)</button><br><br><br><br><br>
        <div id="scorePanel">
            <img src="assets/images/score_img.png" width="20%">
            <h3 id="result">Result</h3><br><br>
            <button onclick="retryRandom()"><strong>Retry</strong></button>
        </div>
        <hr style="background-color: #290628;height: 1px">
        <h5 style="position: absolute;left: 50%;transform: translateX(-50%);color: #564F38;font-family: 'Quicksand', sans-serif;font-size:x-large;">Discussion area</h5><br><br><br>
        <div class="discussion">
            @foreach ($posts as $post)
            <div class="msgContainer">
                <div id="replyNote">Click to submit reply</div>
                <div class="post" onclick="reply({{ $post->Id }},{{ $article->Id }})">
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
        </div>
        <br><hr style="background-color: #290628;height: 1px">
        <div class="form">
            <input type="hidden" value="{{ $article->Id }}" id="articleId">
            <input type="text" placeholder="write a new post or reply here..." class="form-control" id="postContent" data-emoji-picker="true">
            <i class="fas fa-paper-plane submitPost" onclick="Post({{ $article->Id }});"></i>
        </div>
        {{-- username modal --}}
        <div class="modal animate__animated animate__jackInTheBox" id="topTenForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content mod-content">
                <div class="modalHeader">
                    <lord-icon src="https://cdn.lordicon.com//dzllstvg.json" trigger="loop" colors="primary:#240046,secondary:#c7c116" style="width:128px;height:128px"></lord-icon>
                </div>
                <div class="modal-body">
                    <strong>Wooow, your score [<span id="value"></span>] is high enough to be displayed on the top 10 list, if you want that done submit a username
                        to associate with your score.</strong><br><br>
                    <input type="text" class="form-control" id="username" placeholder="Username" required>
                    <input type="hidden" id="hiddenScore">
                    <input type="hidden" id="updateValue">
                </div>
                <div class="modal-footer">
                    <button class="bn" onclick="submitForm()" data-dismiss="modal"><span><small>Submit</small></span></button>
                    <button class="bn" data-dismiss="modal" type="reset"><span><small>No, thanks</small></span></button>
                </div>
            </div>
            </div>
        </div>
        {{-- username modal --}}
    </div>
@endsection