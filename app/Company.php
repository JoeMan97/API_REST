<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $table = "companies";

    protected  $primaryKey = 'company_id';

    protected $fillable = [
        "name",
        "address",
    ];

    public function opinions() {
        return $this->hasMany('App\Opinion');
    }

}
