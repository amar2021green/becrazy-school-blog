@extends('layout.flame')
@section('title','BLOG編集')
@section('body')
<div class= "flex-center position-ref">
  <h1><p class="text-info">BLOG(edit)</p></h1>
  {{--editファイル--}}

  <ul>


<dl>
<form action="/master/update" method="post">
  <dl>
  <dd><input type="hidden" name="id" required value="{{ $編集blog->id }}"></dd>
  </dl>

<dt>Title</dt>
<dd><input type="text" name="title" required value="{{ $編集blog->title }}"></dd>
</dl>
<dl>
<dt>Content</dt>
<dd><textarea name="content" required>{{ $編集blog->content }}</textarea></dd>
</dl>

<dl>
<dt>Status</dt>
<dd><textarea name="status" required>{{ $編集blog->status }}</textarea></dd>
</dl>



@csrf
<input type="submit" value="Done">
<?php
dd($編集blog->title);
?>
</form>

  </ul>
  <a href="http://homestead.test/master/bloglist">Go Home</a>


  </div>
@endsection
