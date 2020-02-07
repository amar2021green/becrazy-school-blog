@extends('layout.flame')
@section('title','BLOG一覧')
@section('body')
<div class="p-3 haikei">

  <div class="flex-center position-ref">


    <ul>
    @foreach ($all as $blogs)

      <a href="/ordinary/list/{{$blogs->slug}}">
        {{$blogs->title}}
      </a>



    <div class="btn-group" role="group" aria-label="グループ1">
      <a href="update{{$blogs->id}}" type="button" class="btn btn-secondary btn-sm">Update</a>
    </div>

    <div class="btn-group" role="group" aria-label="グループ2">
      <form action="delete" method="post">
        <input type="hidden" name="id" required value="{{ $blogs->id }}">
          <button type="button" class="btn btn-warning btn-secondary btn-sm" value="Delete">Delete</button>
      @csrf
      </form>
    </div><br><br>


    @endforeach
    </ul>

    </div>

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
