<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\DoctorCreateRequest;
use App\Http\Requests\DoctorUpdateRequest;



class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
        $doctors= User::doctors()->get();
        return view('doctors.index', compact('doctors'));
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
    public function store(DoctorCreateRequest $request)
    {
        
        User::create($request->only(
            'name', 'email', 'cedula', 'address', 'phone', 'sexo')
        + [
            'role' => 'doctor',
            'password' => bcrypt($request->input('password'))

        ]
    );

        alert()->success('Odontologo Creado correctamente');

        return redirect()->route('doctors.index');
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
    public function update(DoctorUpdateRequest $request, $id)
    {
        $doctor= User::doctors()->findOrFail($id);
        $user = User::doctors()->findOrFail($id);

        $data = $request->only(
            'name', 'email', 'cedula', 'address', 'phone', 'sexo');
        $password = $request->input('password');

        if($password)
          $data['password'] = bcrypt($password);

        $user->fill($data);
        $user->save();
        
        
        

        alert()->success('Odontologo actualizado correctamente');

        return redirect()->route('doctors.index', compact('doctor'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus($doctor_id, $status_code)
    {
        try{
            $update_user = User::whereId($doctor_id)->update([
                'status' =>$status_code
            ]);

            if($update_user){
                return redirect()->route('doctors.index')->with('succes', 'Useer Status Updated');

            }
            return redirect()->route('doctors.index')->with('error', 'fallo');

        }catch (\Throwable $th){
            throw $th;
        }
    }

  
}
