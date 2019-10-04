<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalaryMenu extends Model
{
    //
    public function galaryContent(){
        return $this->hasMany(GalaryContent::class,'galary_id','id');
    }
}
