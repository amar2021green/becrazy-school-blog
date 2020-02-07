@extends('layout.OrdinaryFlame')
@section('title','BLOG一覧')
@section('body')
<div class="p-3 haikei">

  <div class="flex-center position-ref">
    <h1><b>WORLD BLOG</b></h1>
    <ul>
      @foreach ($all as $blogs)

        <a class= "text-white" href="/ordinary/list/{{$blogs->slug}}">
          {{$blogs->title}}
        </a><br><br>

    <br>

      @csrf

    @endforeach
    </ul>
    <br>

  </div>

</div>
@endsection
