<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;

class IndexController extends Controller
{
    public function index (Request $request) {

        if (Auth::check()) {
            return redirect()->route('game');
        }

        return view('index');
    }
}
