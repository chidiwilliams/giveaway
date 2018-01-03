<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pledge;
use App\Play;
use App\Redeem;

class TestController extends Controller
{
    public function test(Request $request)
    {
        // return view('pledge_success');
        // return view('test');
    }

    public function post(Request $request)
    {
        return [
            "pledge" => 45,
            "owner" => "lead",
            "number" => 4
        ];
    }

    public function users(Request $request)
    {
        return User::all();
    }

    public function pledges(Request $request)
    {
        return Pledge::all();
    }

    public function plays(Request $request)
    {
    	return Play::all();
    }
}
