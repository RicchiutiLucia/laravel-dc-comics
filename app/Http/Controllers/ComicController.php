<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;
use App\Models\Comic;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as IlluminateValidationValidator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();

        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComicRequest $request)
    {
        /*
        $request->validate([
            'title' => 'required|max:50',
            'description' => 'nullable|max:65535',
            'thumb' => 'required|url|max:255',
            'price' => 'required|numeric|decimal:2',
            'series' => 'required|max:100',
            'sale_date' => 'nullable|max:20',
            'type' => 'nullable|max:30',
        ],
        [
            'title.required' => "il titolo e' obbligatorio",
            'title.max' => "Il titolo è massimo 50 caratteri",
            'description.max' => "lLa descizione è massimo 65535 caratteri",
            'thumb.required' => "L'url e' obbligatorio",
            'thumb.max' => "L'url è massimo 255 caratteri",
            'thumb.url' => "L'url deve essere valido",
            'price.required' => "Il prezzo e' obbligatorio",
            'price.max' => " il prezzo massimo 4 caratteri",
            'price.numeric' => "Il prezzo deve essere un numero",
            'series.required' => "La serie e' obbligatoria",
            'series.max' => "La serie è Massimo 100 caratteri",
            'sale_date.max' => "La data di vendita è massimo 20 caratteri",
            'type.max' => " Il tipo è massimo 30 caratteri"

        ]
    );*/
      
        //$data = $this->validation($request->all());
        $data = $request->validated();

        $newComic=new Comic();

        /*
        $newComic->title = $data['title'];
        $newComic->description = $data['description'];
        $newComic->thumb = $data['thumb'];
        $newComic->price = $data['price'];
        $newComic->series = $data['series'];
        $newComic->sale_date = $data['sale_date'];
        $newComic->type = $data['type']; */

        $newComic->fill($data);

        $newComic->save();

        return redirect()->route('comics.show',['comic' => $newComic->id])->with('status', 'Nuovo fumetto aggiunto!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        //$comic = Comic::find($id);

        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComicRequest $request, Comic $comic)
    {
       /* $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:65535',
            'thumb' => 'required|url|max:255',
            'price' => 'required|numeric|decimal:2',
            'series' => 'required|max:100',
            'sale_date' => 'nullable|max:20',
            'type' => 'nullable|max:30',
        ]);*/
        
        //$data = $this->validation($request->all());
        $data = $request->validated();
        $comic->update($data);

        return redirect()->route('comics.show',['comic' => $comic->id])->with('status', 'Fumetto aggiornato!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index');
    }
/*
    private function validation($data) {

        $validator = Validator::make(
            $data,
            [
                'title' => 'required|max:50',
                'description' => 'nullable|max:65535',
                'thumb' => 'required|url|max:255',
                'price' => 'required|numeric|decimal:2',
                'series' => 'required|max:100',
                'sale_date' => 'nullable|max:20',
                'type' => 'nullable|max:30',
            ],
            [
                'title.required' => "il titolo e' obbligatorio",
                'title.max' => "Il titolo è massimo 50 caratteri",
                'description.max' => "lLa descizione è massimo 65535 caratteri",
                'thumb.required' => "L'url e' obbligatorio",
                'thumb.max' => "L'url è massimo 255 caratteri",
                'thumb.url' => "L'url deve essere valido",
                'price.required' => "Il prezzo e' obbligatorio",
                'price.max' => " il prezzo massimo 4 caratteri",
                'price.numeric' => "Il prezzo deve essere un numero",
                'series.required' => "La serie e' obbligatoria",
                'series.max' => "La serie è Massimo 100 caratteri",
                'sale_date.max' => "La data di vendita è massimo 20 caratteri",
                'type.max' => " Il tipo è massimo 30 caratteri"
    
            ]
        )->validate();

        return $validator;

    }*/

}
