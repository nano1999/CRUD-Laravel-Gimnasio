<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
Use Redirect;
class ProfesorsController extends Controller
{
    public function dictoActividad($id)
    {
        $User = User::find($id);//Solo lo uso para saber que actividades dicta
        $Activitie = $User->activities;
        return view('Profesors.dictoActividad', compact('Activitie'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $Profesor = new User();
        $Profesor->email = $request->input('email');
        $Profesor->name = $request->input('name');
        $Profesor->password = $request->input('password');
        $Profesor->password = bcrypt($Profesor->password);
        $Profesor->document = $request->input('document');
        $Profesor->lastName = $request->input('lastName');
        $Profesor->type = 1;
        $Profesor->phone = $request->input('phone');
        $Profesor->visibility = 1;
        $Profesor->save();

        $role_profesor = Role::where('name', 'profesor')->first();
        $Profesor->roles()->attach($role_profesor);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $User = User::find($id);
        return view('Profesors.show', compact('User'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $User = User::find($id);
        return view('Profesors.edit', compact('User'));
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
        //MAL  OPTIMIZADO, MEJORAR
        $User = User::find($id);
        $User->email = $request->input('email');
        $User->name = $request->input('name');
        $User->password = $request->input('password');
        $User->password = bcrypt($User->password);
        $User->document = $request->input('document');
        $User->lastName = $request->input('lastName');
        $User->type = 1;
        $User->phone = $request->input('phone');
        $User->visibility = 1;
        $User->save();

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::find($id);
        $User->visibility = 0;
        $User->save();
        return redirect()->route('home');
    }
}
