@extends('layout.flame')
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

    <div class="btn-group" role="group" aria-label="グループ1">
      <a href="taxonomy/update{{$AC->id}}" type="button" class="btn btn-secondary btn-sm">Update</a>
    </div>


    <div class="btn-group" role="group" aria-label="グループ2">
      <form action="/master/taxonomy/delete" method="post">
        <input type="hidden" name="id" required value="{{ $AC->id }}">
          <button type="submit" onclick="deletePost" class="btn btn-warning btn-secondary btn-sm" value="Delete">Delete</button>
      @csrf
      </form>
    </div><br><br>


@endforeach
    </ul>
    <br>
  </div>

  <script>
  function deletePost() {
  //confirm関数はOKandCXLポップアップをだし、OK=true CXL=falseをブラウザ上では返す。
  if (!confirm('Are You Sure ?')) {
  return false;
  }

  }
  </script>
</div>
@endsection
