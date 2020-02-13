@extends('layout.OrdinaryFlame')
@section('title','Category')
@section('body')
<div class="p-3 haikei">

  <div class="flex-center position-ref">
    <h1><b>All Category</b></h1><br>
    <ul>
@foreach($AllCategories as $AC)

    <a href="/ordinary/category/{{$AC->slug}}">
    {{$AC->name}}
    </a>

    <br>

      @csrf

@endforeach
    </ul>
    <br>
  </div>

</div>
@endsection
