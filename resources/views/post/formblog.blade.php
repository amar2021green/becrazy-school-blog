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

    <dt>Status(公開/非公開)</dt>
    <dd><select name="publish">
      <option required value="{{ old('publish') }}">Open</option>
      <option>draft</option>
        </select>
      </dd>


    <dt>Slug(URL)</dt>
    <dd><input type="text" name="slug" required value="{{ old('slug') }}"></dd>



    </dl>


    @csrf
    <input type="submit" value="ADD">
  </form>
</div>
@endsection
