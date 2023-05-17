@extends('layouts.app')


@section('page-title','Dc Comics')


@section('main-content')
    <div class="text-center mb-4 text-white ">
        <h1>lista fumetti</h1>
        <a href="{{route('comics.create')}}" class="btn btn-primary">Aggiungi fumetto</a>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-around">
            @foreach ($comics as $comic)
                <div class="card mb-5 p-0 " style="width: 18rem;">
                   <div>
                        <img src="{{$comic->thumb}}" class="card-img-top h-70" alt="{{$comic->title}}">
                   
                   </div>
                        
                    <div class="card-body">
                        <h5 class="card-title">{{$comic->title}}</h5>
                        <p class="card-text">Serie:{{$comic->series}}</p>
                        <div class="d-flex ">
                            <a href="{{route('comics.show',['comic' => $comic->id])}}" class="btn btn-success">Dettagli</a>
                            <a href="{{route('comics.edit',['comic' => $comic->id])}}" class="btn btn-warning mx-2">Modifica</a>
                            <form action="{{route('comics.destroy',['comic'=>$comic->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Elimina</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>


@endsection