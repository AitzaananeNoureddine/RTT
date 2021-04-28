<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/button.css">
    <link rel="stylesheet" href="/assets/css/button2.css">
    <link rel="stylesheet" href="/assets/css/textHover.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Indie+Flower&family=Shadows+Into+Light&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/emojionearea.min.css">
    <title>Read through typing</title>
</head>
<body>
    <div class="navbar">
        <h3 class="headingWrapper"><a href="/" class="header header--raiseUp header--shadow"><strong class="cap">R</strong>ead<strong class="cap">T</strong>hrough<strong class="cap">T</strong>yping</a></h3>
        <div class="links">
            <a href="/">Home</a>
            <div id="cat" style="margin: 0%;width: fit-content;display: flex;justify-content: space-between;flex-wrap: wrap;">
                <a href="" class="categories_link" onclick="return false">Categories
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                        <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                    </svg>
                </a>
                <div class="sub-menu">
                    <ul>
                        @foreach ($categories as $item)
                            <li><a href="/categories/{{$item->Id}}/{{$item->Name}}">{!! $item->Name !!}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <a href="/top10">Top 10</a> 
            <a href="/about">About us</a>
        </div>
    </div>
    @yield('content')
    <footer>
        <div class="footer_left">
            <h6><small>Copyright &copy; {{date('Y')}} - <small><strong style="color: #240046">Read Through Typing</strong></small></small> -</h6>
        </div>
        <div class="footer_right">
            <img src="/assets/images/ic_fb.png"> &nbsp;
            <img src="/assets/images/ic_twitter.png"> &nbsp;
            <img src="/assets/images/ic_linkedin.png"> &nbsp;
            <img src="/assets/images/ic_github.png">
        </div>
    </footer>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/assets/js/app.js"></script>
    <script src="https://cdn.lordicon.com//libs/frhvbuzj/lord-icon-2.0.2.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/js/emojionearea.min.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>