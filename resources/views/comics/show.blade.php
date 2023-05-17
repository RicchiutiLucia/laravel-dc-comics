
@extends('layouts.app')


@section('page-title','Dc Comics')


@section('main-content')

    <div class="container">
        <div class="row w-50 py-3">
            <div>
                <img src="{{$comic->thumb}}" class="card-img-top w-50" alt="{{$comic->title}}">
            </div>
            <div>
                <h2>{{$comic->title}}</h2>
                <p>Tipo: {{$comic->type}}</p>
                <p>Serie: {{$comic->series}}</p>
                <p>Data di rilascio: {{$comic->sale_date}}</p>
                <p>Prezzo: {{$comic->price}}</p>
                <p>Descrizione: <br />{{$comic->description}}</p>
            </div>
            
            
        </div>
        <a href="{{route('comics.index')}}" class="btn btn-primary mb-3">Torna all'elenco</a>

    </div>


@endsection