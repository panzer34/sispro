<?php

namespace App\Http\Controllers;

use App\Models\Procedure;
use Illuminate\Http\Request;
use App\Http\Requests\ProcedureCreateRequest;
use App\Http\Requests\ProcedureUpdateRequest;


class ProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procedures= Procedure::get();
        return view ('procedures.index', compact('procedures'));
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
    public function store(ProcedureCreateRequest $request)
    {
        Procedure::create($request->all());
        alert()->success('Procedimiento Creado correctamente');

        return redirect()->route('procedures.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function show(Procedure $procedure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function edit(Procedure $procedure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function update(ProcedureUpdateRequest $request, Procedure $procedure)
    {
            $procedure->fill($request->all());
        
            $procedure->save();
    
            alert()->success('Procedimiento actualizado correctamente');
    
            return redirect()->route('procedures.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Procedure $procedure)
    {
        $procedure->delete();
       
        alert()->success('Procedimiento borrado correctamente');
        return redirect()->route('procedures.index');
    }

    public function changeStatus(Request $request)
    {
        $procedure = Procedure::find($request->procedure_id);
        $procedure->status = $request->status;
        $procedure->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }
}
