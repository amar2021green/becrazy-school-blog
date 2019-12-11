@extends('layout.flame')
@section('title','BLOG一覧')
@section('body')
<div class="p-3 mb-2 bg-info text-white">

  <div class="flex-center position-ref">
    <h1><b>BlogList</b></h1>
    <ul>
    @foreach ($all as $blogs)
    <li>
    {{$blogs->title}}：
    {{$blogs->content}}
    @csrf
    </li>
    <br>
    @endforeach
    </ul>
  </div>
</div>
@endsection
