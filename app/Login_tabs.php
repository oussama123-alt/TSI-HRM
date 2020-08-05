<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login_tabs extends Model
{
    //
    protected $fillable = [
        'started_at1','finnish_at2','started_at2','finnish_at2','day','total','user_id'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
