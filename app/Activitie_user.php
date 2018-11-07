<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Activitie_user extends Model
{
    protected $table = 'activitie_user';


    public function saveInfo($Relation, $newActivitie, $User)
    {
    	$Relation->activitie_id = $newActivitie->id;
        $Relation->user_id = $User->id;
        $Relation->control = 0;
        $Relation->realized_pay = Carbon::now();
        $Relation->future_pay = Carbon::now()->addDays(30);
        return $Relation;
    }
}
