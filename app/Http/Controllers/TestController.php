<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Request $request)
    {
        return view("pledge_success");
    	return json_decode("/");
    }

    public function post(Request $request)
    {
    	return "Yes!";
    }
}
