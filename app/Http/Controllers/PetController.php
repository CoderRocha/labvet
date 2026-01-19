<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::all();

        if (isset($pets)) {
        return view('pet.index', compact('pets'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pet.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pet = new Pet();

        $pet->name = $request->input('name');
        if(!$request->file('photo')) {
            $pet->photo_path = '';
        } else {
            $pet->photo_path = $request->file('photo')->store('public/photos');
        }
        $pet->specie           = $request->input('specie');
        $pet->breed            = $request->input('breed');
        $pet->color            = $request->input('color');
        $pet->height           = $request->input('height');
        $pet->weight           = $request->input('weight');
        $pet->gender           = $request->input('gender');
        $pet->birthday         = date('Y-m-d', strtotime($request->input('birthday')));
        $pet->father           = $request->input('father');
        $pet->mother           = $request->input('mother');
        $pet->observations     = $request->input('observations');

        $pet->save();

        return redirect('/pet');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
