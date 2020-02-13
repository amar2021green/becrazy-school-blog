@extends('layout.OrdinaryFlame')
@section('title','Tag-Posts')
@section('body')
<div class="p-3 haikei">
  <div class="flex-center position-ref">
    <h1><b>{{$TagPosts->name}} Tag</b></h1>
    <ul>
    @foreach ($posts as $Tag_Posts)
    <li>
      <a href="/ordinary/list/{{$Tag_Posts->slug}}">
    {{$Tag_Posts->title}}
    </a>
    </li>
    <br>


    @endforeach
    </ul>
    <br>

  </div>

</div>
@endsection
