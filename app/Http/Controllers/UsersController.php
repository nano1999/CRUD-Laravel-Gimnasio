<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Activitie;
use App\Activitie_user;
use Carbon\Carbon;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function asistoActividad($id)
    {
        $User = User::find($id);//Solo lo uso para saber que actividades dicta
        $Activities = $User->activities;
        return view('Users.asistoActividad', compact('Activities'), compact('User'));
    }
    public function altaActividad($id)
    {    
        $User = User::where('id', '=', $id)->get()->first();
        $Activities = Activitie::all();
        return view('Users.altaActividad', compact('User'), compact('Activities'));
    }
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
