<?php

namespace App\Http\Controllers;

use App\Models\Client;
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
        $clients = Client::all();

        if (isset($clients)) {

            return view('pet.new', compact('clients'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = Client::find($request->input('id_client'));

        if(isset($client)) {

        $pet = new Pet();

        $pet->name = $request->input('name');
        $pet->client_id = $request->input('id_client');
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
        $pet = Pet::find($id);

        $clients = Client::all();

        if (isset($pet)) {
        return view('pet.edit', compact('pet', 'clients'));
        } else {
            return redirect('/pet');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pet = Pet::find($id);

        $client = Client::find($request->input('id_client'));

        if(isset($pet)) {

        $pet->name = $request->input('name');
        $pet->client()->associate($client);
        $no_photo = $request->input('no_photo');
        if(isset($no_photo)) {
            $pet->photo_path = '';
        } else {
            if($request->file('photo')) {
                $pet->photo_path = $request->file('photo')->store('photos');
            }
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pet = Pet::find($id);

        if(isset($pet)) {
            $pet->delete();
            return redirect('/pet');
        }
    }
}
