@extends('layouts.app')


@section('page-title','Dc Comics')


@section('main-content')

    <h1>Lista fumetti:</h1>
    <div class="container">
        <div class="row d-flex justify-content-between">
            @foreach ($comics as $comic)
                <div class="card mb-4" style="width: 18rem;">
                    <div>
                        <img src="{{$comic->thumb}}" class="card-img-top" alt="{{$comic->title}}">
                    </div>
                    
                   
                    <div class="card-body">
                        <h5 class="card-title">{{$comic->title}}</h5>
                        <p class="card-text">Serie:{{$comic->series}}</p>
                        <a href="{{route('comics.show',['comic' => $comic->id])}}" class="btn btn-primary">Maggiori dettagli</a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>


@endsection