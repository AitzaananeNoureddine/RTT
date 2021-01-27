@extends('partial/master')
@section('content')
    <div class="content" style="background-color: #CFC9C9;padding-left: 0%;padding-right: 0%;">
        <div class="grid">
            @for ($i = 0; $i < 30; $i++)
                <div class="category">
                    <img src="assets/images/tttabout_img.jpg" width="100%" height="100%" id="bg_image">
                    <h4 id="category_name">cat{{$i}}</h4>
                </div>
            @endfor
        </div>
        <form action="{{ url('fetchArticles') }}" method="GET" id="fetchArticlesForm">
            <input type="hidden" id="cat_name" name="cat_name">
        </form>
    </div>    
@endsection