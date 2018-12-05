<?php

namespace App\Http\Controllers;

use App\Step;
use Illuminate\Http\Request;

class StepController extends Controller
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
      //dd($request->deadline);
      if($request->title != ''){
          $step = new Step;
          $step->title = request('title');
          $step->goal_id = request('goal_id');
          $step->deadline = request('deadline');
          $step->time_value = request('time_value');

          $step->save();
      }

      return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Step  $step
     * @return \Illuminate\Http\Response
     */
    public function show(Step $step)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Step  $step
     * @return \Illuminate\Http\Response
     */
    public function edit(Step $step)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Step  $step
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Step $step)
    {
        //dd($request->deadline);
        if($request->title != ''){
            $step = new Step;
            $step->title = request('title');
            $step->goal_id = request('goal_id');
            $step->deadline = request('deadline');
            $step->time_value = request('time_value');

            $step->save();
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Step  $step
     * @return \Illuminate\Http\Response
     */
    public function destroy(Step $step)
    {
        $step->delete();

        return back()->withInput();
    }
}
