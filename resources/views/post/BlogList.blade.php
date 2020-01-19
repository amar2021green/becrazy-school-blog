@extends('layout.flame')
@section('title','BLOG一覧')
@section('body')
<div class="p-3 mb-2 bg-info text-white">

  <div class="flex-center position-ref">
    <h1><b>BlogList</b></h1>
    <ul>
    @foreach ($all as $blogs)
    <li>
    {{$blogs->title}}：
    {{$blogs->content}}
    </li>
    <br>

    <a href="update{{$blogs->id}}">Update</a>
    <br>

    <form action="delete" method="post">
      <dl>
      <dd><input type="hidden" name="id" required value="{{ $blogs->id }}"></dd>
      </dl>
      <input type="submit" value="Delete">
      @csrf
  </form>

    @endforeach
    </ul>
    <br>

    <head>
    <link rel="stylesheet" type="text/css" href="button.css">
    </head>

    <div class="form_conf">
    <form id="logout-form" action="/master/logout" method="POST">
    @csrf
    <input type="submit" value="Logout">
    </form>
    <a href="http://homestead.test/master/addblog">
            <button type="button">AddForm</button>
            <br>
            <a href="http://homestead.test/master/addTag">
                    <button type="button">AddTag</button>
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
