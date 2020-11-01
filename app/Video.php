<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $primaryKey='video_id';

    public function videoCate(){
        return $this->belongsTo('App\VideoCategory','cate_id','id');
    }
}
