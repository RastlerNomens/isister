<?php

namespace App\Http\Controllers;

use App\Pet;
use Illuminate\Http\Request;
use Auth;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;

        $pets = Pet::where('owner',$user_id)->get();

        return view("pets.index", ["pets"=>$pets]);
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
            'name' => 'required',
            'code' => 'required|digits_between:10,15',
        ]);

        $pet = new Pet();

        $pet->owner = Auth::user()->id;
        $pet->name = $request->get('name');
        $pet->race = $request->get('race');
        $pet->gender = $request->get('gender');
        $pet->birthday = $request->get('birthday');
        $pet->code_chip = $request->get('code');

        $pet->save();

        return redirect()->route('mascotas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(Pet $pet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pet = Pet::find($id);

        $pet->name = $request->get('name');
        $pet->race = $request->get('race');
        $pet->gender = $request->get('gender');
        $pet->birthday = $request->get('birthday');
        $pet->code_chip = $request->get('code_chip');
        
        $pet->save();

        return redirect()->route('mascotas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pet = Pet::find($id);

        $pet->delete();

        return redirect()->route('mascotas.index');
    }
}
