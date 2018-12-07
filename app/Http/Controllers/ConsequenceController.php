<?php

namespace App\Http\Controllers;

use App\Consequence;
use App\Goal;
use Illuminate\Http\Request;
use Auth;

class ConsequenceController extends Controller
{
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->title != ''){
            $consequence = new Consequence;
            $consequence->goal_id = request('goal_id');
            $consequence->sector_id = request('sector');
            $consequence->title = request('title');
            $consequence->value = getCalculatedArmValue(request('value'));

            $consequence->save();
        }

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consequence  $consequence
     * @return \Illuminate\Http\Response
     */
    public function show(Consequence $consequence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consequence  $consequence
     * @return \Illuminate\Http\Response
     */
    public function edit(Consequence $consequence)
    {
      //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consequence  $consequence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consequence $consequence)
    {
        $consequence->sector_id = request('sector');
        $consequence->title = request('title');
        $consequence->value = getCalculatedArmValue(request('value'));
        $consequence->save();

        // Assign new consequence to request('goal_id')

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consequence  $consequence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consequence $consequence)
    {
        $consequence->delete();

        return back()->withInput();
    }
}
