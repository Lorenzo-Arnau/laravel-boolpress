@extends('partials.base')
@section('title')
lists
@endsection
@section('content')
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Cognome</th>
        <th scope="col">Mail</th>
        <th scope="col">Indirizzo</th>
        <th scope="col">Immagine Profilo</th>
        <th scope="col"> <a class="btn btn-primary" href="\post" role="button">Go to posts</a> </th>
      </tr>
    </thead>
    <tbody>
        @foreach($dates as $date)
        <tr>
            <th scope="row">{{$date->id}}</th>
            <td>{{$date->name}}</td>
            <td>{{$date->surname}}</td>
            <td>{{$date->specs->mail}}</td>
            <td>{{$date->specs->address}}</td>
            <td><img src="{{$date->specs->pic}}" alt="" width="200"></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
