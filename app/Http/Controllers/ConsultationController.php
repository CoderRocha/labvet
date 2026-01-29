<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pet;
use App\Models\Vet;
use App\Models\Procedure;
use App\Models\Consultation;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultations = Consultation::all();

        if (isset($consultations)) {
            return view('consultation.index', compact('consultations'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pets = Pet::all();
        $vets = Vet::all();
        $procedures = Procedure::all();

        if(isset($pets) && isset($vets) && isset($procedures)) {
            return view('consultation.new', compact('pets', 'vets', 'procedures'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pet = Pet::find($request->input('id_pet'));
        $vet = Vet::find($request->input('id_vet'));

        $consultation = new Consultation;
        $consultation->date = date('Y-m-d', strtotime($request->consultation_date));
        $consultation->pet()->associate($pet);
        $consultation->vet()->associate($vet);
        $consultation->total_cost = $request->input('total_value');
        $consultation->save();

        // for the procedures

        $procedures = json_decode($request->input('memo_procedures'));
        foreach ($procedures as $value) {
            $consultation->procedures()->attach($value->IDPROCEDURE);
        }

        return redirect('/consultation');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $consultation = Consultation::find($id);
        if(isset($consultation)) {
            return view('consultation.show', compact('consultation'));
        }
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
        $consultation = Consultation::find($id);
        if(isset($consultation)) {
            $consultation->delete();
        }

        return redirect('/consultation');
    }
}
