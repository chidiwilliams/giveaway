<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pledge extends Model
{
    protected $fillable = [
        'pledger', 'item', 'qty'
    ];

    public function pledger()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function redeem() 
    {
        return $this->hasOne('App\Redeem');
    }
}
