<?php

namespace App\Http\Controllers;

use App\Models\berichten;
use Illuminate\Http\Request;

class BerichtenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berichten = berichten::latest()->paginate(5);

        return view('berichten.index', compact('berichten'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berichten.create');
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
            'title' => 'required',
            'content' => 'required',
            'auteur',
            'auteur_id'
        ]);

        berichten::create($request->all());

        return redirect()->route('berichten.index')
            ->with('success', 'Het bericht is aangemaakt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\berichten  $berichten
     * @return \Illuminate\Http\Response
     */
    public function show(berichten $berichten)
    {
        return view('berichten.show', compact('berichten'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\berichten  $berichten
     * @return \Illuminate\Http\Response
     */
    public function edit(berichten $berichten)
    {
        return view('berichten.edit', compact('berichten'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\berichten  $berichten
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, berichten $berichten)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $berichten->update($request->all());

        return redirect()->route('berichten.index')
            ->with('success', 'Het bericht is aangepast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\berichten  $berichten
     * @return \Illuminate\Http\Response
     */
    public function destroy(berichten $berichten)
    {
        $berichten->delete();

        return redirect()->route('berichten.index')
            ->with('success', 'Het bericht is verwijderd!');
    }
}
