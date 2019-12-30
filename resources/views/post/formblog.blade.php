@extends('layout.flame')
@section('title','BLOG投稿')
@section('body')
<div class="p-3 mb-2 bg-info text-white">

  <dl>
  <form action="/master/addblog" method="post">

    <dt>Title</dt>
    <dd><input type="text" name="title" required value="{{ old('title') }}"></dd>
    </dl>
    <dl>
    <dt>Content</dt>
    <dd><textarea name="content" required>{{ old('content') }}</textarea></dd>

    <dt>Status</dt>
    <dd><input type="text" name="status" required value="{{ old('status') }}"></dd>
    //公開範囲の指定

    <dt>Slug</dt>
    <dd><input type="text" name="slug" required value="{{ old('slug') }}"></dd>
    //記事のURL指定


    </dl>


    @csrf
    <input type="submit" value="ADD">
  </form>
</div>
@endsection
