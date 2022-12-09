<?php

namespace App\Http\Controllers;

use App\Models\Supply;
use App\Http\Requests\SuppliesCreateRequest;
use App\Http\Requests\SuppliesUpdateRequest;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $supplies= Supply::get();
        return view('supplies.index', compact('supplies'));
        
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
    public function store(SuppliesCreateRequest $request)
    {
        Supply::create($request->all());
        alert()->success('Insumo Creado correctamente');

        return redirect()->route('supplies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function show(Supply $supply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function edit(Supply $supply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function update(SuppliesUpdateRequest $request, Supply $supply)
    {
            $supply->fill($request->all());
        
            $supply->save();
    
            alert()->success('Insumo actualizado correctamente');
    
            return redirect()->route('supplies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supply $supply)
    {
        $supply->delete();
       
        alert()->success('Insumo borrado correctamente');
        return redirect()->route('supplies.index');
    }

    public function changeStatus(Request $request)
    {
        $supply = Supply::find($request->supply_id);
        $supply->status = $request->status;
        $supply->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }
}
