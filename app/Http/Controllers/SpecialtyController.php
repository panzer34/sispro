<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpecialtyRequest;
use App\Http\Requests\SpecialtyUpdateRequest;
use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialties= Specialty::get();
        return view('specialties.index', compact('specialties'));

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
    public function store(SpecialtyRequest $request)
    {
        Specialty::create($request->all());
        alert()->success('Espeacialidad Creada correctamente');

        return redirect()->route('specialties.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function show(Specialty $specialty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialty $specialty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function update(SpecialtyUpdateRequest $request, Specialty $specialty)
    {
            $specialty->fill($request->all());
        
            $specialty->save();
    
            alert()->success('Especialidad actualizada correctamente');
    
            return redirect()->route('specialties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $specialty= Specialty::find($id);
        if ($specialty != null) {
            
        $specialty->delete();
        }
        alert()->success('Especialidad borrada correctamente');
        return redirect()->route('specialties.index');
    }

    public function changeStatus(Request $request)
    {
        $specialty = Specialty::find($request->specialty_id);
        $specialty->status = $request->status;
        $specialty->save();
        
  
        return response()->json(['success'=>'Status change successfully.']);
    }

}