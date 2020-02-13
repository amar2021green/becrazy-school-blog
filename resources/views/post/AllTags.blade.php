@extends('layout.flame')
@section('title','Tag')
@section('body')
<div class="p-3 haikei">

  <div class="flex-center position-ref">
    <h1><b>All Tag</b></h1><br>
    <ul>
@foreach($AllTags as $AT)

    <a href="/ordinary/tag/{{$AT->slug}}">
    #{{$AT->name}}
  </a>

      <div class="btn-group" role="group" aria-label="グループ1">
        <a href="taxonomy/update{{$AT->id}}" type="button" class="btn btn-secondary btn-sm">Update</a>
      </div>


      <div class="btn-group" role="group" aria-label="グループ2">
        <form action="/master/taxonomy/delete" method="post">
          <input type="hidden" name="id" required value="{{ $AT->id }}">
            <button type="submit" onclick="deletePost" class="btn btn-warning btn-secondary btn-sm" value="Delete">Delete</button>
        @csrf
        </form>
      </div><br><br>
@endforeach
    </ul>
    <br>

  </div>

</div>
@endsection
