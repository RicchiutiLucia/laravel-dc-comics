<?php

namespace App\Http\Controllers;
use App\Models\Comic;

use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:65535',
            'thumb' => 'required|url|max:255',
            'price' => 'required|numeric|decimal:2',
            'series' => 'required|max:100',
            'sale_date' => 'nullable|max:20',
            'type' => 'nullable|max:30',
        ]);
      
        $data = $request->all();

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
    public function update(Request $request, Comic $comic)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:65535',
            'thumb' => 'required|url|max:255',
            'price' => 'required|numeric|decimal:2',
            'series' => 'required|max:100',
            'sale_date' => 'nullable|max:20',
            'type' => 'nullable|max:30',
        ]);
        
        $data = $request->all();
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
}
