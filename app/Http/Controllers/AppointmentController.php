<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Specialty;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments= Appointment::get();
        $doctors= User::doctors()->get();
        $specialties= Specialty::get();

        return view('appointments.index', compact('appointments', 'doctors', 'specialties'));
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
         //dd($request->all());
            $input = $request->all();
            Appointment::create($input);
            
            alert()->success('Receta Creada correctamente');
            return redirect()->route('appointments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $input = $request->all();
        $appointment->update($input);
        $appointment->save();

        alert()->success('Receta actualizada correctamente');
        return redirect()->route('appointments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

    public function changeStatus(Request $request)
    {
        $appointment = Appointment::find($request->appointment_id);
        $appointment->status = $request->status;
        $appointment->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }

    public function pdfdown ($id){
        
     
        // $appointments = Appointment::find($id);
        // view()->share('appointments.download-pdf', $appointments);
        // $pdf = PDF::loadView('appointments.download-pdf', compact('appointments'));
        // return $pdf->download('appointments.pdf');

        $appointment = Appointment::find($id);

        

        $pdf = PDF::loadView('appointments.download-pdf', compact('appointment'));
         return $pdf->download('appointments.pdf');

       

    }
}
