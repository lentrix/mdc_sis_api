<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassTime extends Model
{
    public $table = "class_time";

    public function section()
    {
        return $this->belongsTo('App\Section', 'class_code', 'class_code');
    }
}
