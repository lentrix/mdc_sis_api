<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudEnrol extends Model
{
    public $table = "stud_enrol";

    public function theCourse()
    {
        return $this->belongsTo('App\Course', 'course', 'cr_num');
    }

    public function studInfo()
    {
        return $this->belongsTo('App\StudInfo', 'idnum', 'idnum');
    }
}
