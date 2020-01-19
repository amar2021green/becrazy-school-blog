@extends('layout.flame')
@section('title','Tag投稿')
@section('body')
<div class="p-3 mb-2 bg-info text-white">

  <dl>
  <form action="/master/addTag" method="post">

    <dt>Category</dt>
    <dd>
      <select id="type" name="type" size="6" multiple>
        <option value="Asia">Asia</option>
        <option value="North America">North America</option>
        <option value="South America">South America</option>
        <option value="Europe">Europe</option>
        <option value="Africa">Africa</option>
        <option value="Other">Other Area</option>
      </select>

      <dt>Tag</dt>
      <dd><input type="text" name="name" required value="{{ old('name') }}"></dd>

    <dt>Slug(URL)</dt>
    <dd><input type="text" name="slug" required value="{{ old('slug') }}"></dd>



    </dl>


    @csrf
    <input type="submit" value="ADD">
  </form>
</div>
@endsection
