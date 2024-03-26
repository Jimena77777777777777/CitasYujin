<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DoctorController extends Controller
{
 
    public function index()
    {
        $doctors= User::doctors()->get();
        return view('doctors.index',compact('doctors'));
    }


    public function create()
    {
        return view('doctors.create');
    }


    public function store(Request $request)
    {
        $rules =[
            'name'=> 'required|min:3',
            'email'=> 'required|email',
            'cedula' => 'required|digits:10',
            'address' => 'nullable|min:6',
            'phone' => 'required',
        ];

        $messages =[
            'name.required' =>'El nombre del med ico es obligatorio uwu',
            'name.min' =>'El nombre del médico debe tener 3 caracteres',
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
                'role' => 'doctor',
                'password' => bcrypt($request->input('password'))
            ]
        );

        $notification='El médico se registró con éxito';
        return redirect('/medicos') -> with(compact('notification'));


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
        $doctor =User::doctors()->findOrFail($id);
        return view('doctors.edit', compact('doctor'));
    }

  
    public function update(Request $request, $id)
    {
        $rules =[
            'name'=> 'required|min:3',
            'email'=> 'required|email',
            'cedula' => 'required|digits:10',
            'address' => 'nullable|min:6',
            'phone' => 'required',
        ];

        $messages =[
            'name.required' =>'El nombre del med ico es obligatorio uwu',
            'name.min' =>'El nombre del médico debe tener 3 caracteres',
            'email.required'=> 'El correo electronico es obligatorio',
            'email.email'=> 'Ingresa un correo electronico que sea valido',
            'cedula.required'=>'La cedula es obligatoria',
            'cedula.digits'=> 'La cedula debe tener 9 digitos porque estamos en Perú xd',
            'address.min'=>'La direccion debe tener al menos 8 caracteres',
            'phone.required'=>'El número de telefono es obligatorio',

        ];

        $this->validate($request, $rules, $messages);
        $user = User::doctors()->findOrFail($id);
        $data =  $request->only('name','email','cedula','address','phone');
        $password = $request->input('password');

        if($password)
            $data['password'] = bcrypt($password);

        $user->fill($data);
        $user->save();

        $notification='La informacion del medico se actualizo correctamente';
        return redirect('/medicos') -> with(compact('notification'));

    }

    
    public function destroy($id)
    {
        $user = User::doctors()->findOrFail($id);
        $doctorName = $user-> name;
        $user->delete();

        $notification = "El medico $doctorName se elimino correctamente";
        return redirect ('/medicos')->with(compact('notification'));
    }
}