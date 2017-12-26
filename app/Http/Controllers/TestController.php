<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Request $request)
    {
    	$attr = ["name", "course", "level", "item", "qty"];
    	$form = [];

    	foreach ($attr as $key) {
    		$form[$key] = strtolower($request[$key]);
    	}

    	return $form;
    }
}
