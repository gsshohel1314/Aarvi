<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model{
    protected $primaryKey='gallery_id';

    public function GalCate(){
        return $this->belongsTo('App\GalleryCategory','gcate_id','gcate_id');
    }
}
