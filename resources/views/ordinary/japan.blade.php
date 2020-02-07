@extends('layout.flame')
@section('title','Japan')
@section('body')
<div class="p-3 haikei">
  
  <div class="flex-center position-ref">
    <h1><b>{{$kizi1->title}}</b></h1>
    <ul>



    {{$kizi1->content}}


    <br>

      @csrf


    </ul>
    <br>

  </div>

</div>
@endsection
