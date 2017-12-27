<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Pledge;

class PledgeController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = ["ACCOUNTING","APPLIED BIOLOGY","APPLIED GEOPHYSICS","ARCHITECTURE","BANKING AND FINANCE","BIOCHEMISTRY","BUILDING TECHNOLOGY","BUSINESS ADMINISTRATION","CHEMICAL ENGINEERING","CIVIL ENGINEERING","COMPUTER ENGINEERING","COMPUTER SCIENCE","DEMOGRAPHY","ECONOMICS","ELECT-ELECT","ENGLISH","ESTATE MANAGEMENT","I.C.E.","INDUSTRIAL CHEMISTRY","INDUSTRIAL RELATIONS","INTERNATIONAL RELATIONS","MARKETING","MASS COMMUNICATION","MATHEMATICS","MECHANICAL ENGINEERING","MICROBIOLOGY","MIS","PETROLEUM ENGINEERING","PHYSICS","POLITICAL SCIENCE","PSYCHOLOGY","SOCIOLOGY"];

        $params = [
            "courses" => $courses
        ];

        return view('pledge', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        	'name' => ['required', 'string'],
        	// 'course' => ['required', Rule::in(['Computer Science'])],
        	'course' => ['required'],
        	'level' => ['required', Rule::in(['100', '200', '300', '400', '500'])],
        	'item' => ['required', 'string'],
        	'qty' => ['required', 'integer']
        ])->validate();

        $pledge = new Pledge;

        $pledge->pledger = Auth::user()->id;
        $pledge->item = $request->item;
        $pledge->qty = $request->qty;

        $pledge->save();

        return view("pledge_success");
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
}
