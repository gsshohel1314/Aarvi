<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model{
    protected $primaryKey='post_id';

    public function creator(){
        return $this->belongsTo('App\User','post_creator','id');
    }
}
