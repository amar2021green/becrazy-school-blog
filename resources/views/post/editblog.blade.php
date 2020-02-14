@extends('layout.flame')
@section('title','BLOG編集')
@section('body')
<div class="p-3 haikei">
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

<dt>Status(公開/非公開)</dt>
<dd><select name="status">
  <option value="Open">OPEN</option>
  <option value="Draft">Draft</option>
    </select>
  </dd>

  <dt>Tag</dt>
  <dd><select name="tag">
    <option value="">選択してください</option>
    @foreach($taxonomy as $tag)
      @if($tag->type == 'tag')

        <option value="{{($tag->id)}}">
          {{$tag->name}}
        </option>

      @endif
    @endforeach
      </select>
    </dd>


    <dt>Category<dt>
      <dd><select name="category">
        <option value="">選択してください</option>
        @foreach($taxonomy as $category)
          @if($category->type == 'category')

            <option value="{{$category->id}}">
              {{$category->name}}
            </option>
          @endif
        @endforeach
      </select>
    </dd>


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
