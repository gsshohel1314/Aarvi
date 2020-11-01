<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplyAward extends Model{
    protected $primaryKey='aa_id';

    public function awardCate(){
        return $this->belongsTo('App\Award','award_id','award_id');
    }
}
