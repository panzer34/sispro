<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Medicine;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prescriptions= Prescription::get();
        $medicines = Medicine::where('status', '1')->get();
        $doctors= User::doctors()->get();
        return view('prescriptions.index', compact('prescriptions', 'medicines', 'doctors'));
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
        
            
            $input = $request->all();
            Prescription::create($input);
            alert()->success('Receta Creada correctamente');
            return redirect()->route('prescriptions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(Prescription $prescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
         
        //dd($request->all());
            $input = $request->all();
            $prescription->update($input);
            $prescription->update();

      
     

        alert()->success('Receta editada correctamente');
        return redirect()->route('prescriptions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        $prescription->delete();
       
        alert()->success('Receta borrada correctamente');
        return redirect()->route('prescriptions.index');
    }
    
    public function pdfadown($id){

        
        $prescription = Prescription::find($id);

        $pdf = PDF::loadView('prescriptions.download-pdfa', compact('prescription'));
         return $pdf->setPaper(array(0,0,500,500))->download('prescriptions.pdf');
       
    }
}
