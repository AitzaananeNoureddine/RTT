@extends('partial/master')
@section('content')
    <div class="content" style="padding-top: 10%;background-color: #CFC9C9;">
        <div id="section1">
            <img src="assets/images/winner_pic.png" width="43%" height="39%" data-aos="fade-right" data-aos-duration="2500">
            <div class="winner">
                <h2>Jack <br> Reacher</h2>
                <h3>with <strong style="color: #CC004E">120</strong> wpm</h3>
            </div>
        </div><br>
        <a href="#section2"><img src="assets/images/ic_arrow_down.png" width="40px" height="40px" class="arrowDown" data-aos="flip-left" data-aos-duration="1500"></a>
        <br><br><br>
        <hr class="styled_hr">
        <div id="section2">
            <img src="assets/images/ic_medal.png" class="ic_medal">
            @for ($i = 0; $i < 9; $i++)
                <div class="user">
                    <h3 style="color: #ee3e54">username</h3>
                    <h5 style="color: #e0a825">100 wpm</h5>
                </div>
            @endfor
        </div>
        <a href="#section1"><img src="assets/images/ic_scroll_up.png" width="50px" height="50px" class="arrowUP" data-aos="flip-left" data-aos-duration="2000"></a>
    </div>
@endsection