<?php

namespace App\Http\Controllers;

use App\Disease;
use App\Pet;
use App\Vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $vaccines = Vaccine::where('pet',$id)->get();
        $pet = Pet::find($id);
        $disease = Disease::where('race',$pet['race'])->get();

        return view('vaccines.index', ['vaccines'=>$vaccines,'pet'=>$pet,'diseases'=>$disease]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'date' => 'required',
            'next' => 'required'
        ]);

        $vaccine = new Vaccine();

        $vaccine->pet = $request->get('pet');
        $vaccine->type = $request->get('type');
        $vaccine->date = $request->get('date');
        $vaccine->next = $request->get('next');
        $vaccine->weight = $request->get('weight');
        $vaccine->batch = $request->get('batch');
        $vaccine->veterinary = $request->get('veterinary');

        $vaccine->save();

        return redirect()->route('vacunas.index',$request->get('pet'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function show(Vaccine $vaccine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function edit(Vaccine $vaccine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vaccine $vaccine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vaccine $vaccine)
    {
        //
    }
}
