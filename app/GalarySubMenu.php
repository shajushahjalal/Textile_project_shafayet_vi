<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalarySubMenu extends Model
{
    //
    public function galaryMenu(){
        return $this->belongsTo(GalaryMenu::class,'galary_menu_id','id')->orderBy('id','ASC');
    }

    public function galaryContent(){
        return $this->hasMany(GalaryContent::class,'galary_submenu_id')->orderBy('id','ASC');
    }
}
