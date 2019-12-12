@extends('layout.flame')
@section('title','BLOG投稿')
@section('body')
<div class="p-3 mb-2 bg-info text-white">

  <dl>
  <form action="addTodolists" method="POST">

    <dt>Title</dt>
    <dd><input type="text" name="title" required value="{{ old('title') }}"></dd>
    </dl>
    <dl>
    <dt>Content</dt>
    <dd><textarea name="content" required>{{ old('content') }}</textarea></dd>
    </dl>


    @csrf
    <input type="submit" value="ADD">
  </form>
</div>
@endsection
