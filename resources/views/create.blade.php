@extends('partials.base')
@section('title')
making-post
@endsection
@section('content')
<form action="{{ route('post.store')}}" method="post">
    @csrf
    @method('POST')
    <div class="form-group">
        <label for="author-id">Author</label>
        <select class="custom-select" name="author_id">
            @foreach($authors as $author)
            <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Post title</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title here!" name="title">
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">Post Content</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="content"></textarea>
    </div>
    <div class="form-group">
        <label for="tags[]">Tags</label>
        <select class="custom-select" name="tags[]" multiple>
            @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary" type="submit">Submit post</button>
  </form>
@endsection
