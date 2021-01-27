@extends('partial/master')
@section('content')
<div class="content" style="text-align: center;background-color: #CFC9C9">
    <h3 style="color: #5C5C5C">{{$cat_name}}</h3><br>
    <div class="grid">
        @for ($i = 0; $i < 30; $i++)
            <button class="article">art{{$i}}</button>
        @endfor
    </div>
</div>
@endsection