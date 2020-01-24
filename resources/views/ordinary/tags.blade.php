@extends('layout.flame')
@section('title','Tag')
@section('body')
<div class="p-3 mb-2 bg-info text-white">

  <div class="flex-center position-ref">
    <h1><b>Tag</b></h1>
    <ul>

    <li>
    {{$tag1->type}}
    {{$tag1->name}}

    </li>
    <br>

      @csrf


    </ul>
    <br>

  </div>

</div>
@endsection
