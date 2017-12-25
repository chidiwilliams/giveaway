<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PledgeController extends Controller
{
    public function pledge()
    {
    	return view('pledge');
    }
}
