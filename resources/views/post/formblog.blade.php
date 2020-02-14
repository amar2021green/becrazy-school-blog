@extends('layout.flame')
@section('title','BLOG投稿')
@section('body')
<div class="p-3 haikei">

  <dl>
  <form action="/master/addblog" method="post">

    <dt>Title</dt>
    <dd><input type="text" name="title" required value="{{ old('title') }}"></dd>
    </dl>
    <dl>
    <dt>Content</dt>
    <dd><textarea name="content" required>{{ old('content') }}</textarea></dd>

    <dt>Status(公開/非公開)</dt>
    <dd><select name="status">
      <option value="Open">OPEN</option>
      <option value="Draft">Draft</option>
        </select>
      </dd>


    <dt>Slug(URL)</dt>
    <dd><input type="text" name="slug" required value="{{ old('slug') }}"></dd>

    <dt>Tag</dt>
    <dd><select name="tag">
      @foreach($allType as $tag)
        @if($tag->type == 'tag')
          <option value="{{($tag->id)}}">
            {{$tag->name}}
          </option>

        @endif
      @endforeach
        </select>
      </dd>

      {{--👆フォームにTaxonomyテーブルに登録されたTagデータを入れたい👆--}}
      {{--Taxonomyテーブルのコレクションが入った$allTypeをforeachで回すため$allType as $tag（Taxonomyのレコードが増えるたびに<option value="taxonomy">国名</option>と書かなきゃいけないのを防ぐため、@foreach を使う）--}}
      {{--このままだとtypeが全て同じものをDBからとってくるので--}}
      {{--@if($tag->type == 'tag') として $tagのtypeがtagのもの指定する--}}
      {{--<option value="{{($tag->id)}}">としてidをサーバーに送る--}}
      {{--最後のセレクトに表示される名前を{{$tag->name}}としてtypeがtagのnameを表示する--}}

      <dt>Category<dt>
        <dd><select name="category">
          @foreach($allType as $category)
            @if($category->type == 'category')
              <option value="{{$category->id}}">
                {{$category->name}}
              </option>
            @endif
          @endforeach
        </select>
      </dd>

    </dl>


    @csrf
    <input type="submit" value="ADD">
  </form>
</div>
@endsection
