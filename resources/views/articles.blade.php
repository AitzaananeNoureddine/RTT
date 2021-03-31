@extends('partial/master')
@section('content')
    <div class="content" style="background-color: #CFC9C9;padding-left: 0%;padding-right: 0%;">
        <div class="grid">
            @foreach ($articles as $item)
                <div class="article">
                    {{-- <p>{{ public_path().'/assets/images/'.$item->Img }}</p> --}}
                    {{-- "{{ public_path().'/assets/images/'.$item->Img }}" --}}
                    <img src="/assets/images/{{ $item->Img }}" width="100%" height="100%" id="bg_image">
                    <h4 id="article_name">{{$item->Title}}</h4>
                    <p style="display: none">{{ $item->Id }}</p>
                </div>
            @endforeach
            <form action="{{ route('fetchArticle') }}" method="POST" id="fetchArticleForm">
                @csrf
                <input type="hidden" id="article_id" name="article_id">
            </form>
        </div>
    </div>    
@endsection