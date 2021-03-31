@extends('partial/master')
@section('content')
    <div class="content" style="background-color: #CFC9C9;text-align: center;padding: 7% 2% 150px 2% !important;">
        <h2 style="color: #230052;font-family: 'Josefin Sans', sans-serif;">{{ $article->Title == '' ? "Random typing test":$article->Title }}</h2><br>
        <div contenteditable="false" id="randomTxt" class="form-control">{{ $article->Content }}</div>
        <textarea name="" id="typingArea" rows="1" class="form-control" style="resize: none;" onfocus="this.value = ''" onkeypress="start(event);">start typing...</textarea>
        <button class="resetB" onclick="retryRandom()"><strong>Reset</strong></button>
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
                    <div style="font-family: 'Caveat', cursive;">{{ $post->created_at }}</div>{{ $post->Content }}
                </div>
            </div>
            @php
                $replies = App\Models\Reply::where('Post',$post->Id)->get();
            @endphp
            @foreach ($replies as $reply)
            <div class="msgContainer">
                <div id="replyNote">Click to submit reply</div>
                <div class="reply">
                    <div style="font-family: 'Caveat', cursive;">{{ $reply->created_at }}</div>{{ $reply->Content }}
                </div>
            </div>
            @endforeach
            @endforeach
        </div>
        <br><hr style="background-color: #290628;height: 1px">
        <div class="buttonNfield">
            <a href="" onclick="return false" class="btnCustom button" data-front="Post"></a>
            <div class="form">
                <input type="text" placeholder="write a new post or reply here..." class="form-control" id="postContent">
                <input type="submit" value="Submit" class="btn btn-light" style="width: max-content !important;height: max-content !important;" onclick="Post({{ $article->Id }});">
            </div>
        </div>
        {{-- username modal --}}
        <div class="modal animate__animated animate__jackInTheBox" id="topTenForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modalHeader">
                    <lord-icon src="https://cdn.lordicon.com//cnmbpmsl.json" trigger="loop" colors="primary:#140029,secondary:#08a88a" style="width:128px;height:128px"></lord-icon>
                    <lord-icon src="https://cdn.lordicon.com//dzllstvg.json" trigger="loop" colors="primary:#5c5c5c,secondary:#c7c116" style="width:128px;height:128px"></lord-icon>
                    <lord-icon src="https://cdn.lordicon.com//cnmbpmsl.json" trigger="loop" colors="primary:#140029,secondary:#08a88a" style="width:128px;height:128px"></lord-icon>
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