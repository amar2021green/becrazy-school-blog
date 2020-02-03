@extends('layout.flame')
@section('title','Japan')
@section('body')
<div class="p-3 mb-2 bg-info text-white">

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
