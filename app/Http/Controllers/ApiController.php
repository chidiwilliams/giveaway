<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Play;
use App\Pledge;
use App\Redeem;
use App\User;
use App\SocialFacebookAccount;
use App\SocialTwitterAccount;

class ApiController extends Controller
{
    public function plays ()
    {
        return Play::all();
    }

    public function pledges ()
    {
        return Pledge::all();
    }

    public function redeems ()
    {
        return Redeem::all();
    }

    public function users ()
    {
        return User::all();
    }

    public function users_twitter()
    {
        return SocialTwitterAccount::all();
    }

    public function users_facebook()
    {
        return SocialFacebookAccount::all();
    }
}
