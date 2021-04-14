@extends('partial/master')
@section('content')
    <div class="content" style="background-color: #CFC9C9;font-family: 'Coda Caption', sans-serif;padding-top: 10%">
        <h3 style="color:#362B64">About us</h3>
        <hr style="background-color: #290628;height: 1px"><br>
        <div class="about_container">
            <img src="assets/images/about_img.jpg" data-aos="fade-right" data-aos-duration="1500">
            <p data-aos="fade-up" data-aos-duration="1600">
                Do you enjoy touch typing,and would like to get better at it ? do you also like to
                read books and articles but never seem to find time ? well with RTT you can
                do them both simultaniously and freely.
            </p>
        </div>
        <p class="alt_paragraph">
            Do you enjoy touch typing,and would like to get better at it ? do you also like to
            read books and articles but never seem to find time ? well with RTT you can
            do them both simultaniously and freely. <br>
            The idea for this plateforme came from the fact that we enjoy touch typing
            but in the practice process we did not want to type just some random meaningless words,
            but instead copy portions of articles,books and quotes,which would benefit us intellectually and the users
            of the application.
        </p>
        <div class="skipL"><br><br><br></div>
        <div class="about_container">
            <img src="assets/images/about_img2.jpg" data-aos="fade-right" data-aos-duration="1500"> 
            <p data-aos="fade-left" data-aos-duration="1600">
                The idea for this plateforme came from the fact that we enjoy touch typing
                but in the practice process we did not want to type just some random meaningless words,
                but instead copy portions of articles,books and quotes,which would benefit us intellectually and the users
                of the application.
            </p>
        </div>
        <br>
        <hr class="styled_hr">
        <h5 style="position: absolute;left: 50%;transform: translateX(-50%);color: #1F183F;font-family: 'Quicksand', sans-serif;font-size:x-large;">Creators</h5><br>
        <div class="about_container cr_container" style="justify-content: space-evenly;padding-top: 50px">
            <div class="creator cr1" data-aos="fade-up" data-aos-duration="1000">
                <img src="assets/images/creator_img1.jpg" width="35%" height="50%">
                <a href="https://www.linkedin.com/in/noureddine-aitzaanane-127394140/" target="_blank"><h6>
                    <br> Noureddine Aitzaanane
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                    </svg>
                </h6></a><br>
                <p>second year computer science engineering student</p>
            </div>
            <div class="creator cr2" data-aos="fade-up" data-aos-duration="1000">
                <img src="assets/images/creator_img2.jpg" width="35%" height="50%">
                <a href="https://www.linkedin.com/" target="_blank"><h6>
                    <br> Mohammad Akraou
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                    </svg>
                </h6></a><br>
                <p>second year computer science engineering student</p>
            </div>
            <div class="creators_alt">
                <a href="https://www.linkedin.com/in/noureddine-aitzaanane-127394140/" target="_blank"><h6>
                    Noureddine Aitzaanane
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                    </svg>
                </h6></a>
                <p>second year computer science engineering student</p><br>
                <a href="#" target="_blank"><h6>
                    Mohammad Akraou &nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                    </svg>
                </h6></a>
                <p>second year computer science engineering student</p>
            </div>
        </div>
    </div>
@endsection