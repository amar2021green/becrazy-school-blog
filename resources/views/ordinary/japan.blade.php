@extends('layout.flame')
@section('title','Japan')
@section('body')
<div class="p-3 mb-2 bg-info text-white">

  <div class="flex-center position-ref">
    <h1><b>Japan</b></h1>
    <ul>

    <li>
    {{$kizi1->title}}
    {{$kizi1->content}}

    </li>
    <br>

      @csrf


    </ul>
    <br>

  </div>

</div>
@endsection
