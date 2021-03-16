@extends('partial/master')
@section('content')
    <div class="content" style="padding-top: 10%;font-family: 'Coda Caption', sans-serif;">
        {{-- <h1 data-aos="fade-down" data-aos-delay="500"><strong>R</strong>ead <strong>T</strong>hrough <strong>T</strong>yping </h1> --}}
        <div class="left" data-aos="fade-right">
            <h4 style="color: #fae1dd"><strong>Welcome to where you can read, type and discuss ideas</strong></h4><br><br>
            <h5>Select a category and choose an article you would like to type -> read <br> <br>
                <strong style="color: #FFEC99">or</strong> choose a random text to test and practice your touch typing skills</h5><br><br><br>
            <button data-aos="fade-up" onclick=" location.href='randomTest' "><strong>Start random</strong></button>
        </div><br>
        <div class="right" data-aos="fade-left">
            <img src="assets/images/slider-icon.png">
        </div>
    </div>
@endsection