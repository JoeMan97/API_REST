<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{

    protected $table = "opinions";

    protected  $primaryKey = 'opinion_id';

    protected $fillable = [
        "puntuation",
        "title",
        "resume",
        "ip_address",
        "company_id",
        "user_id"
    ];

    public function company() {
        return $this->belongsTo('App\Company');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
    
}
