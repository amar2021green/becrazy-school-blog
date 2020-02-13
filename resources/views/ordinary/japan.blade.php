@extends('layout.OrdinaryFlame')
@section('title','Japan')
@section('body')
<div class="p-3 haikei">

  <div class="flex-center position-ref">
    <h1><b>{{$kizi1->title}}</b></h1>
    <ul>



    {{$kizi1->content}}




      @csrf


    </ul>
    

  </div>

</div>
@endsection
