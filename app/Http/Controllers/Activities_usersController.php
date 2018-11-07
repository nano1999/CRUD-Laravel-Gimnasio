<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activitie_user;
use App\Activitie;
use App\User;
use Carbon\Carbon;
class Activities_usersController extends Controller
{
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
        $verify = $request->input('user');//Verifica si el que lo envio es usuario
        if(isset($verify))//si es usuario, entra aca
        {
            $User = User::where('id', '=', $request->input('user'))->get()->first();
            $newActivitie = Activitie::where('id', '=', $request->input('activitie'))->get()->first();
            $isUser = true;
        } else {
            $User = User::where('document', '=', $request->input('document'))->get()->first();
            $newActivitie = Activitie::where('name', '=', $request->input('name'))->get()->first();
            $isUser = false;
        }

        $isAttending = false;//ya esta asistiendo

        if($isUser == true)
        {

            $isFull = $newActivitie->isFull($newActivitie);
            if($isFull == 0)
            {
                $isAttending = $User->isAttending($User, $newActivitie);
                if($isAttending == false)   
                {
                    $Relation = new Activitie_user();
                    $Relation->type = 0;
                    $Relation = $Relation->saveInfo($Relation, $newActivitie, $User);
                    $Relation->save();
                    $newActivitie->actAl = $newActivitie->actAl + 1;
                    $newActivitie->save();
                    return redirect()->back()->withSuccess('Registrado Correctamente');
                } else {
                    return redirect()->back()->withSuccess('Ya Estabas Registrado En Esta Actividad');
                }  
            } else {
                return redirect()->back()->withSuccess('Ya No Hay Cupo');
            }
            
            
        } else {//Si no es usuario(es profesor) entra aca
            if($User->type != 1)//comprueba que sea profesor
            {
                return redirect()->back()->withSuccess('Documento incorrecto');
            }
            $isAttending = $User->isAttending($User, $newActivitie);

            foreach ($newActivitie->users as $Users)
            {
                if($Users->type == 1)
                {
                    return redirect()->back()->withSuccess('ya hay un profesor asignado a la actividad');
                }
            }        
            if($isAttending == 0)   
            {
                $Relation = new Activitie_user();
                $Relation->type = 1;
                $Relation = $Relation->saveInfo($Relation, $newActivitie, $User);
                $Relation->save();
                return redirect()->back()->withSuccess('Registrado Correctamente');
            }
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
