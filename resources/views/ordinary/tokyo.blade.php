@extends('layout.OrdinaryFlame')
@section('title','Tokyo')
@section('body')
<div class="p-3 haikei">

  <div class="flex-center position-ref">
    <h1><b>{{$TagPost->title}}</b></h1>
    <ul>



    {{$TagPost->content}}


    <br>

      @csrf


    </ul>
    <br>

  </div>

</div>
@endsection
