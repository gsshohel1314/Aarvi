<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model{
    protected $primaryKey='bcate_id';

    public function creator(){
        return $this->belongsTo('App\User','bcate_creator','id');
    }
}
