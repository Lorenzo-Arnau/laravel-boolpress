@extends('partials.base')
@section('title')
Posts
@endsection
@section('content')
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Titolo</th>
        <th scope="col">Contenuto</th>
        <th scope="col">Nome Autore</th>
        <th scope="col"> <a class="btn btn-primary" href="\list" role="button">Go to Authors</a> </th>
      </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td><a href="\post\{{$post->id}}">{{$post->title}}</a></td>
            <td>{{$post->content}}</td>
            <td>{{$post->author->name}} {{$post->author->surname}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
