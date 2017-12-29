<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redeem extends Model
{
    protected $fillable = [
        'pledger', 'item', 'qty'
    ];
}
