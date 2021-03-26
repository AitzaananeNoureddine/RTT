@extends('partial/master')
@section('content')
    <div class="content" style="background-color: #CFC9C9;text-align: center;padding-top: 7%">
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