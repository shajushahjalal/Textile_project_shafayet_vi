<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalaryContent extends Model
{
    //
    public function galary()
    {
        return $this->belongsTo(GalaryMenu::class);
    }

    public function subMenu(){
        return $this->belongsTo(GalarySubMenu::class,'galary_submenu_id');
    }
}
