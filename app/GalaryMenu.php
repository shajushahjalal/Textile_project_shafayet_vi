<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalaryMenu extends Model
{
    //
    public function galaryContent(){
        return $this->hasMany(GalaryContent::class,'galary_id','id')->orderBy('id','ASC');
    }

    public function galarySubMenu(){
        return $this->hasMany(GalarySubMenu::class,'galary_menu_id')->orderBy('id','ASC');
    }

}
