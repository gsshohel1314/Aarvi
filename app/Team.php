<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function bloodgroup(){
        return $this->belongsTo('App\BloodGroup','blood_group','id');
    }

    public function teamCate(){
        return $this->belongsTo('App\TeamCategory','tcate_id','tcate_id');
    }
}
