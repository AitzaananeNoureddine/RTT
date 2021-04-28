@extends('partial/master')
@section('content')
    <div class="content" style="padding-top: 8%;font-family: 'Coda Caption', sans-serif;">
        <div class="row">
            <div class="left col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
              <h4 style="color: #10002b;"><strong>Welcome to where you can read, type and discuss ideas</strong></h4><br><br>
              <h5>Select a category and choose an article you would like to type -> read <br> <br>
                  <strong style="color: #10002b">or</strong> choose a random text to test and practice your touch typing skills</h5><br><br><br>
              <button data-aos="fade-up" onclick=" location.href='typingTest' "><strong>Start random</strong></button>
            </div>
            <div class="right col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="200">
              <img src="assets/images/slider-icon.svg"><br><br>
            </div>
        </div>
    </div>
@endsection