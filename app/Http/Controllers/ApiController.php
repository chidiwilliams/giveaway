<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Play;
use Illuminate\Support\Facades\Auth;


class ApiController extends Controller
{
    public function plays ()
    {
        return Auth::user()->plays;
    }
}
