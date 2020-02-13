@extends('layout.OrdinaryFlame')
@section('title','Tag')
@section('body')
<div class="p-3 haikei">

  <div class="flex-center position-ref">
    <h1><b>All Tag</b></h1>
    <ul>
@foreach($AllTags as $AT)

    <a href="/ordinary/tag/{{$AT->slug}}">
    #{{$AT->name}}
    </a>



      @csrf

@endforeach
    </ul>
    <br>

  </div>

</div>
@endsection
