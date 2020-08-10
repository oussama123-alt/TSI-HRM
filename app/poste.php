<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class poste extends Model
{
    protected $fillable = [
        'name','discription','nbr_postes','created_at'
    ];

    public function candidat()
    {
        return $this->hasMany('App\candidat');
    }
    
}
