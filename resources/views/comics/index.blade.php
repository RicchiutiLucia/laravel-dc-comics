@extends('layouts.app')


@section('page-title','Dc Comics')


@section('main-content')

    <div class="text-center mb-4 text-white ">
        <h1>lista fumetti</h1>
        <a href="{{route('comics.create')}}" class="btn btn-primary">Aggiungi un nuovo fumetto</a>
    </div>
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