<?php

namespace App\Http\Controllers;

use App\Models\Vet;
use Illuminate\Http\Request;

class VetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vets = Vet::all();

        if (isset($vets)) {
        return view('vet.index', compact('vets'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vet.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vet = new Vet();

        $vet->name = $request->input('name');
        $vet->email = $request->input('email');
        $vet->phone = $request->input('phone');
        $vet->address = $request->input('address');
        $vet->state = $request->input('state');

        $vet->save();

        return redirect('/vet');
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
        $vet = Vet::find($id);

        if (isset($vet)) {
        return view('vet.edit', compact('vet'));
        } else {
            return redirect('/vet');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vet = Vet::find($id);

        if(isset($vet)) {

            $vet->name = $request->input('name');
            $vet->email = $request->input('email');
            $vet->phone = $request->input('phone');
            $vet->address = $request->input('address');
            $vet->state = $request->input('state');

            $vet->save();

            return redirect('/vet');
        } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vet = Vet::find($id);

        if(isset($vet)) {
            $vet->delete();
            return redirect('/vet');
        }
    }
}
