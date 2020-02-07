@extends('layout.flame')
@section('title','タグに紐づく記事一覧')
@section('body')
<div class="p-3 haikei">

  <div class="flex-center position-ref">
    <h1><b>Category Posts</b></h1>
    <ul>
    @foreach ($CategoryPost as $Cpp)
    <li>
      <a href="/ordinary/{{$Cpp->slug}}">
    {{$Cpp->title}}
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
