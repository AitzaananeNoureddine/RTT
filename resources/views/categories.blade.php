@extends('partial/master')
@section('content')
    <div class="content" style="background-color: #CFC9C9;padding-left: 0%;padding-right: 0%;">
        <div class="grid">
           @foreach ($articles as $item)
               
          
                <div class="category">
                    <img src="assets/images/tttabout_img.jpg" width="100%" height="100%" id="bg_image">
                    <h4 id="category_name">{{$item->Title}}</h4>
                </div>
                @endforeach
        </div>
        <form action="{{ url('fetchArticles') }}" method="GET" id="fetchArticlesForm">
            <input type="hidden" id="cat_name" name="cat_name">
        </form>
    </div>    
@endsection