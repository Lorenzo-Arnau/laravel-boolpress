@extends('partials.base')
@section('title')
Posts
@endsection
@section('content')


@foreach($posts as $post)
<div class="card post-card" style="width: 50rem;">
    <img class="card-img-top"  src="{{ asset($post->pics) }}" alt="Card image cap" width="200">
    <div class="card-body">
      <h5 class="card-title">{{$post->title}}</h5>
      <p class="card-text">{{$post->content}}</p>
      <span class="card-text">Author:{{$post->author->name}}</span>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><h4>Tags</h4></li>
        @foreach($post->tags as $tag)
        <li class="list-group-item">#{{$tag->name}}</li>
        @endforeach
    </ul>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><h4>Comments:</h4></li>
        @foreach($post->comments as $comment)
        <li class="list-group-item">{{$comment->content}}</li>
        @endforeach
    </ul>
    <div class="card-body">
      <a href="\list"  role="button" class="btn btn-primary">Go to Authors</a>
      <a href="post\create"  role="button" class="btn btn-primary">Create new</a>
      <form action="{{route('post.destroy',['post' => $post])}}" method="post">
        @csrf
        @method('DELETE')
       <button type="submit"  class="btn btn-danger">Delete Post</button>
      </form>
    </div>
  </div>
  @endforeach
@endsection
