<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubEnrol extends Model
{
    public $table = "sub_enrol";

    public function studInfo()
    {
        return $this->belongsTo('App\StudInfo', 'idnum', 'idnum');
    }

    public function section()
    {
        return $this->belongsTo('App\Section', 'class_code', 'class_code');
    }

    public function studEnrol()
    {
        return StudEnrol::where('idnum', $this->idnum)
            ->where('sem_code', $this->sem_code)->first();
    }
}
