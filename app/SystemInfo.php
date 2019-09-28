<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemInfo extends Model
{
    // get System Info
    public function getSystem() {
        $data = SystemInfo::first();
        return $data;
    }
}
