@extends('layout.flame')
@section('title','Tag投稿')
@section('body')
<div class="p-3 mb-2 bg-info text-white">

  <dl>
  <form action="/master/addTag" method="post">

    <dt>Type</dt>
    <dd>
      <select id="type" name="type" size="5" multiple>
        <option value="1">Asia</option>
        <option value="2">North America</option>
        <option value="3">South America</option>
        <option value="4">Europe</option>
        <option value="5">Africa</option>
      </select>

      <dt>name</dt>
      <dd><input type="text" name="name" required value="{{ old('name') }}"></dd>

    <dt>Slug(URL)</dt>
    <dd><input type="text" name="slug" required value="{{ old('slug') }}"></dd>



    </dl>


    @csrf
    <input type="submit" value="ADD">
  </form>
</div>
@endsection
