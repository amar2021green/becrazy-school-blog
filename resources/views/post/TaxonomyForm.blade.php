@extends('layout.flame')
@section('title','Taxonomy投稿')
@section('body')
<div class="p-3 haikei">

  <dl>
  <form action="/master/AddTaxonomy" method="post">

    <dt>Type</dt>
    <dd>
      <select id="type" name="type" size="2" multiple>
        <option value="category">Category</option>
        <option value="tag">Tag</option>
      </select>

      <dt>Name</dt>
      <dd><input type="text" name="name" required value="{{ old('name') }}"></dd>

    <dt>Slug(URL)</dt>
    <dd><input type="text" name="slug" required value="{{ old('slug') }}"></dd>



    </dl>


    @csrf
    <input type="submit" value="ADD">
  </form>
</div>
@endsection
