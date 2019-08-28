<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudInfo extends Model
{
    public $table = "stud_info";

    public function subEnrols()
    {
        return $this->hasMany('App\SubEnrol', 'idnum', 'idnum');
    }
}
