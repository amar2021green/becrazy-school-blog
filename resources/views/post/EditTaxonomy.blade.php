@extends('layout.flame')
@section('title','Taxonomy編集')
@section('body')
<div class="p-3 haikei">
<div class= "flex-center position-ref">
  <h1><p class="text-info">Taxonomy(edit)</p></h1>
  {{--editファイル--}}

  <ul>


<dl>
<form action="/master/taxonomy/update" method="post">
  <dl>
  <dd><input type="hidden" name="id" required value="{{ $編集taxonomy->id }}"></dd>
  </dl>

<dt>Name</dt>
<dd><input type="text" name="name" required value="{{ $編集taxonomy->name }}"></dd>
</dl>
<dl>
  <dt>Slug(URL)</dt>
<dd><input type="text" name="slug" required value="{{ $編集taxonomy->slug }}">
</dd>
</dl>
@csrf
<input type="submit" value="Done">
<?php
dd($編集taxonomy->name);
?>
</form>

  </ul>
  <a href="http://homestead.test/master/bloglist">Go Home</a>


  </div>
@endsection
