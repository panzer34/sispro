<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Requests\MedicineCreateRequest;
use App\Http\Requests\MedicineUpdateRequest;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines= Medicine::get();
        return view('medicines.index', compact('medicines'));
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
    public function store(MedicineCreateRequest $request)
    {
        Medicine::create($request->all());
        alert()->success('Medicamento Creado correctamente');


        return redirect()->route('medicines.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(MedicineUpdateRequest $request, Medicine $medicine)
    {
            $medicine->fill($request->all());
        
            $medicine->save();
    
            alert()->success('Medicamento actualizado correctamente');
    
            return redirect()->route('medicines.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
       
        alert()->success('Medicamento borrado correctamente');
        return redirect()->route('medicines.index');
    }

    public function changeStatus(Request $request)
    {
        $medicine = Medicine::find($request->medicine_id);
        $medicine->status = $request->status;
        $medicine->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }

}
