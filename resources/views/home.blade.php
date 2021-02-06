@extends('partial/master')
@section('content')
    <div class="content">
        <h1 data-aos="fade-down" data-aos-delay="500"><strong>R</strong>ead <strong>T</strong>hrough <strong>T</strong>yping </h1>
        <div class="left" data-aos="fade-right">
            <h5>Select a category and choose an article you would like to type -> read <br> <br>
                <strong style="color: #FFEC99">or</strong> choose a random text to test and practice you touch typing skills</h5><br><br>
            <button data-aos="fade-up" onclick=" location.href='randomTest' "><strong>Start random</strong></button>
        </div>
        <div class="right" data-aos="fade-left">
            <img src="assets/images/slider-icon.png">
        </div>
       
    </div>
@endsection