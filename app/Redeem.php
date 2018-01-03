<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redeem extends Model
{
    protected $fillable = [
        'user_id', 'pledge_id'
    ];

    public function winner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function pledge()
    {
        return $this->belongsTo('App\Pledge', 'pledge_id');
    }
}
