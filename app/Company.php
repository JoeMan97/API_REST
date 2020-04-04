<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function opinions() {
        return $this->hasMany('App\Opinion');
    }
}
