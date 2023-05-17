
@extends('layouts.app')


@section('page-title','Dc Comics')


@section('main-content')
    <div class="text-center mb-4 text-white ">
        <h1>Lista fumetti</h1>
        <a href="{{route('comics.create')}}" class="btn btn-primary">Aggiungi fumetto</a>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-around">
            @foreach ($comics as $comic)
                <div class="card mb-5 p-0" style="width: 18rem;">
                   
                        <img src="{{$comic->thumb}}" class="card-img-top" alt="{{$comic->title}}">
                    
                    <div class="card-body">
                        <h5 class="card-title">{{$comic->title}}</h5>
                        <p class="card-text">Serie:{{$comic->series}}</p>
                        <div class="d-flex ">
                            <a href="{{route('comics.show',['comic' => $comic->id])}}" class="btn btn-primary">Dettagli</a>
                            <a href="{{route('comics.edit',['comic' => $comic->id])}}" class="btn btn-warning mx-2">Modifica</a>
                            
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$comic->id}}">
                                Elimina
                              </button>
                            @include('partials.modal')
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>


@endsection