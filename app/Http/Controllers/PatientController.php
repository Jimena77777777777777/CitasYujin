<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PatientController extends Controller
{
 
    public function index()
    {
        $patients= User::patients()->get();
        return view('patients.index',compact('patients'));
    }


    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $rules =[
                'name'=> 'required|min:3',
                'email'=> 'required|email',
                'cedula' => 'required|digits:10',
                'address' => 'nullable|min:6',
                'phone' => 'required',
            ];
    
            $messages =[
                'name.required' =>'El nombre del paciente es obligatorio uwu',
                'name.min' =>'El nombre del paciente debe tener 3 caracteres',
                'email.required'=> 'El correo electronico es obligatorio',
                'email.email'=> 'Ingresa un correo electronico que sea valido',
                'cedula.required'=>'La cedula es obligatoria',
                'cedula.digits'=> 'La cedula debe tener 9 digitos porque estamos en Perú xd',
                'address.min'=>'La direccion debe tener al menos 8 caracteres',
                'phone.required'=>'El número de telefono es obligatorio',
    
            ];
    
            $this->validate($request, $rules, $messages);
    
            User::create(
                $request->only('name','email','cedula','address','phone')
                +[
                    'role' => 'paciente',
                    'password' => bcrypt($request->input('password'))
                ]
            );
    
            $notification='El paciente se registró con éxito';
            return redirect('/pacientes') -> with(compact('notification'));
    
    
        }
    
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}