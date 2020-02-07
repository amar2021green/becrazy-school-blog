@extends('layout.flame')
@section('title','BLOG一覧')
@section('body')
<div class="p-3 haikei">
  
  <div class="flex-center position-ref">
    <h1><b>Blog</b></h1>
    <ul>
    @foreach ($all as $blogs)
    <li>
    {{$blogs->title}}：
    {{$blogs->content}}
    </li>
    <br>

      @csrf

    @endforeach
    </ul>
    <br>

  </div>

</div>
@endsection
