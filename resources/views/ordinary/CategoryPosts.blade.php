@extends('layout.OrdinaryFlame')
@section('title','Category-Posts')
@section('body')
<div class="p-3 haikei">
  <div class="flex-center position-ref">
    <h1><b>{{$category1->name}} Category</b></h1>
    <ul>
    @foreach ($posts as $category_post)
    <li>
      <a href="/ordinary/list/{{$category_post->slug}}">
    {{$category_post->title}}
    </a>
    </li>
    <br>


    @endforeach
    </ul>
    <br>

  </div>

</div>
@endsection
