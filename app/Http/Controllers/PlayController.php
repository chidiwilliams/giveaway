<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Play;
use App\Pledge;
use App\Redeem;
use App\User;


class PlayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plays = Play::orderBy('created_at', 'desc')->get();

        $params = [
            "plays" => $plays
        ];

        return view('plays', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (count(Auth::user()->pledges)) {
            return view('play');
        } else {
            /* TODO: Change this to a better view */
            return "Error. Please return to home.";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO: 
        // 1. Make a play
        // If the play was successful, 
        // 2. Find free pledges, randomize
        // 3. Make redeem
        // 4. Return prize item, quantity and pledger.
        // 5. Return plays by user.

        $play = new Play;
        $play->user_id = Auth::user()->id;
        $play->win = $request->win;
        $play->save();
        
        $prize = "";
        $pledger = "";

        if ($request->play) {
            $unred = Pledge::doesntHave('redeem')->get();
            // TODO: Remove the pledges by the signed in user
            
            $randNum = rand(0, $unred->count() - 1);
            $randUnred = $unred[$randNum];

            $redeem = new Redeem;
            $redeem->user_id = Auth::user()->id;
            $redeem->pledge_id = $randUnred["id"];
            $redeem->save();

            $prize = $randUnred;
            $pledger = Pledge::find($randUnred["id"])->pledger;
        }

        $plays = Auth::user()->plays;

        return [
            "prize" => $prize,
            "pledger" => $pledger,
            "plays" => $plays
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function all()
    {
        return Play::orderBy('created_at', 'desc')->get();
    }
}
