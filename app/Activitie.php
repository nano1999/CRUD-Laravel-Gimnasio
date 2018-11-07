<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activitie extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'activitie_user')->withPivot('type', 'control', 'realized_pay', 'future_pay');
    }

    public function isFull($newActivitie)
    {
    	if($newActivitie->actAl < $newActivitie->maxAl)
    	{
    		return 0;
    	}
        return 1;
    }

}
