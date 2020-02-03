@extends('layout.flame')
@section('title','タグに紐づく記事一覧')
@section('body')
<div class="p-3 mb-2 bg-info text-white">

  <div class="flex-center position-ref">
    <h1><b>Tag Posts</b></h1>
    <ul>
    @foreach ($TagPost as $Tpp)
    <li>
      <a href="/ordinary/{{$Tpp->slug}}">
    {{$Tpp->title}}
    </a>
    </li>
    <br>

      @csrf

    @endforeach
    </ul>
    <br>

  </div>

</div>
@endsection
