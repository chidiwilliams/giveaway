<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class IndexController extends Controller
{
    public function index (Request $request) {
        return view('index');
    }
}
