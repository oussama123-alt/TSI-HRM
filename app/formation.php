<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class formation extends Model
{
    protected $fillable = [
        'name', 'contenu', 'created_at','debut','fin',
    ];

    public function participants()
    {
        return $this->belongsToMany(User::class);
    }
    public function formateur()
    {
        return $this->belongsTo('App\User');
    }
    public function getRouteKeyName(){
        return 'id';
    }
    public $timestamps = false;
}
