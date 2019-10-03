<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalaryMenu extends Model
{
    //
    public function galaryContent(){
        return $this->hasMany(galaryContent::class,'galary_id','id');
    }
}
