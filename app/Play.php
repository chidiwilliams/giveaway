<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Play extends Model
{
    protected $fillable = [
        'user_id', 'win'
    ];

    public function player()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
