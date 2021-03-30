@extends('partials.base')
@section('title')
Comments
@endsection
@section('content')
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Post</th>
        <th scope="col">Commenti</th>
        <th scope="col"> <a class="btn btn-primary" href="\post" role="button">Go to Posts</a> </th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">{{$post->id}}</th>
            <th scope="row">{{$post->content}}</th>
            @foreach($post->comments as $comment)
            <td>{{$comment->content}}</td>
            @endforeach
        </tr>
    </tbody>
</table>
@endsection
