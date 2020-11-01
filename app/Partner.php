<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model{
    protected $primaryKey='partner_id';

    public function partnerCate(){
        return $this->belongsTo('App\PartnerCategory','partner_type','pcate_id');
    }
}
