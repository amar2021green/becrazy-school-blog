@extends('layout.flame')
@section('title','Category')
@section('body')
<div class="p-3 mb-2 bg-info text-white">

  <div class="flex-center position-ref">
    <h1><b>Category</b></h1>
    <ul>

    <li>
    {{$category1->type}}
    {{$category1->name}}

    </li>
    <br>

      @csrf


    </ul>
    <br>

  </div>

</div>
@endsection
