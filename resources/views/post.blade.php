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
        <th scope="col">Immagine Allegata</th>
        <th scope="col"> <a class="btn btn-primary" href="\list" role="button">Go to Authors</a> </th>
        <th scope="col"> <a class="btn btn-primary" href="post\create" role="button">Create new</a> </th>
      </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td><a href="\post\{{$post->id}}">{{$post->title}}</a></td>
            <td>{{$post->content}}</td>
            <td>{{$post->author->name}} {{$post->author->surname}}</td>
            @if (!empty($post->pics))
            <td><img width="200" src="{{ asset($post->pics) }}" /></td>
            @endif
            @foreach($post->tags as $tag)
            <td>{{$tag->name}}</td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
