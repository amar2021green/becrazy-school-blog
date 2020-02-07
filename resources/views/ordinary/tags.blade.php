@extends('layout.flame')
@section('title','Tag')
@section('body')
<div class="p-3 haikei">
  
  <div class="flex-center position-ref">
    <h1><b>Tag</b></h1>
    <ul>
@foreach($AllTags as $AT)
    <li>
    <a href="/master/AllTags/{{$AT->slug}}">
    {{$AT->name}}
  </a>
    </li>
    <br>

      @csrf

@endforeach
    </ul>
    <br>
    <a href="http://homestead.test/master/addblog">
      <button type="button">AddForm</button><br>

        <a href="http://homestead.test/master/addTag">
          <button type="button">AddTag</button><br>

            <a href="http://homestead.test/master/bloglist">Go Top</a>

  </div>

</div>
@endsection
