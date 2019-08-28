<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $table = "subjects";

    public function sections()
    {
        return $this->hasMany('App\Section');
    }
}
