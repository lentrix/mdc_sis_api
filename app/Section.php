<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public $table = "class";

    public function subject()
    {
        return $this->belongsTo('App\Subject', 'sub_code', 'sub_code');
    }

    public function time()
    {
        return $this->hasOne('App\ClassTime', 'class_code', 'class_code');
    }

    public function semester()
    {
        return $this->belongsTo('App\Semester', 'sem_code', 'sem_code');
    }

    public function subEnrols()
    {
        return $this->hasMany('App\SubEnrol', 'class_code', 'class_code');
    }
}
