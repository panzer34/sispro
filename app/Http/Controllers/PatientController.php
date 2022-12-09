<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\PatientCreateRequest;
use App\Http\Requests\PatientUpdateRequest;

class PatientController extends Controller
{
    public function index()
    {
        $patients= User::patients()->get();
        return view('patients.index', compact('patients'));
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
    public function store(PatientCreateRequest $request)
    {
        
        User::create($request->only(
            'name', 'email', 'cedula', 'address', 'phone', 'sexo')
        + [
            'role' => 'paciente',
            'password' => bcrypt($request->input('password'))

        ]
    );

        alert()->success('Paciente Creado correctamente');

        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatientUpdateRequest $request, $id)
    {
        $patients= User::patients()->findOrFail($id);
        $user = User::patients()->findOrFail($id);

        $data = $request->only(
            'name', 'email', 'cedula', 'address', 'phone', 'sexo');
        $password = $request->input('password');

        if($password)
          $data['password'] = bcrypt($password);

        $user->fill($data);
        $user->save();
        
        
        

        alert()->success('Paciente actualizado correctamente');

        return redirect()->route('patients.index', compact('patients'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::patients()->findOrFail($id);
        $patientsName= $user->name;
        $user->delete();
       
        alert()->success('Paciente borrado correctamente');
        return redirect()->route('patients.index');
    }

    public function updateStatusPaciente($paciente_id, $status_code_paciente)
{

    try{
        $update_user = User::whereId($paciente_id)->update([
            'banned_until' => $status_code_paciente
        ]);

        if($update_user){
            return redirect()->route('patients.index')->with('succes', 'Useer Status Updated');

        }
        return redirect()->route('patients.index')->with('error', 'fallo');

    }catch (\Throwable $th){
        throw $th;
    }
}

}