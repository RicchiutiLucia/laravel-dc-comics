@extends('layouts.app')


@section('page-title','Dc Comics')


@section('main-content')

    <div class="container">
        <div class="row">
            <form method="POST" action="{{route('comics.update',['comic'=>$comic->id])}}">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="thumb" class="form-label">Url Immagine:</label>
                    <input type="text" class="form-control" id="thumb" name="thumb" value="{{old('thumb',$comic->thumb)}}">
                    @error('thumb')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title',$comic->title)}}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione:</label>
                    <textarea class="form-control" id="description" name="description">{{old('description',$comic->description)}}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo:</label>
                    <input type="number" step=".01" class="form-control" id="price" name="price" value="{{old('price',$comic->price)}}">
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="series" class="form-label">Serie:</label>
                    <input type="text" class="form-control" id="series" name="series" value="{{old('series',$comic->series)}}">
                    @error('series')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Tipo:</label>
                    <input type="text" class="form-control" id="type" name="type" value="{{old('type',$comic->type)}}">
                    @error('type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="sale_date" class="form-label">Data di rilascio:</label>
                    <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{old('sale_date',$comic->sale_date)}}">
                    @error('sale_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Aggiorna fumetto</button>

        </form>
    </div>
</div>


@endsection