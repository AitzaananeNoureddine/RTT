@extends('partial/master')
@section('content')
    <div class="content" style="padding-top: 10%;background-color: #CFC9C9;">
        <div id="section1">
            <img src="assets/images/winner_pic.png" width="43%" height="39%" data-aos="fade-right" data-aos-duration="2500">
            <div class="winner">
                <h2>{{$scores[0]->Username}}</h2><br>
                <h3>with <strong style="color: #CC004E">{{$scores[0]->Value}}</strong> wpm</h3>
            </div>
        </div><br>
        <a href="#section2"><img src="assets/images/ic_arrow_down.png" width="40px" height="40px" class="arrowDown" data-aos="flip-left" data-aos-duration="1500"></a>
        <br><br><br>
        <hr class="styled_hr">
        <div id="section2">
            <img src="assets/images/ic_medal.png" class="ic_medal">
            @for ($i = 1; $i < count($scores); $i++)
                <div class="user">
                    <h3 style="color: #240046;font-family: 'Righteous', cursive;"><small>{{$scores[$i]->Username}}</small></h3>
                    <h5 style="color: #e0a825">{{$scores[$i]->Value}} wpm</h5>
                </div>
            @endfor
        </div><br>
        <a href="#section1" class="arrowUP"><img src="assets/images/ic_scroll_up.png" width="30px" height="30px" data-aos="flip-left" data-aos-duration="2000"></a>
    </div>
@endsection