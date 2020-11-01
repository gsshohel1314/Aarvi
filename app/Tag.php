<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model{
    protected $primaryKey='tag_id';

    public function creator(){
        return $this->belongsTo('App\User','tag_creator','id');
    }
}
