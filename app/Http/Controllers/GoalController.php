<?php

namespace App\Http\Controllers;

use App\Goal;
use App\Step;
use App\Consequence;
use Illuminate\Http\Request;
use Auth;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        //dd($user->goals);
        return view('goals.index', ['goals' => $user->goals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

      //
      // $goal = new Goal;
      // $goal->title = request('title');
      // $goal->value = 0;
      // $goal->shelf_id = 0;
      // $goal->completed = false;
      //
      // $goal->save();
      // //dd($goal);
      // $goals = Goal::all();
      //
      // return view('goals.index', ['goals' => $goals]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $user = Auth::user();
      //dd($request);
      $goal = new Goal;
      $goal->user_id = $user->id;
      $goal->title = request('title');
      $goal->value = 0;
      $goal->completed = false;

      $goal->save();
      //dd($goal);
      $goals = Goal::all();

      return view('goals.index', ['goals' => $goals]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function show(Goal $goal)
    {
        echo $goal;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function edit(Goal $goal)
    {
        $consequences = Consequence::where('goal_id',$goal->id)->get();

        $steps = Step::where('goal_id',$goal->id)->get();

        return view('goals.edit', ['goal' => $goal, 'consequences' => $consequences, 'steps' => $steps]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Goal $goal)
    {
        //dd(request()->all());

        $goal->title = request('title');
        $goal->value = request('value');
        $goal->save();

        $goals = UsersGoals::where('user_id, $user->id');

        return redirect('/goals');
        //return view('goals.index', ['goals' => $goals]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goal $goal)
    {
        //
    }

        /**
         * Json view
         *
         * @param  \App\Goal  $goal
         * @return \Illuminate\Http\Response
         */
        public function json(Goal $goal)
        {
            $user = Auth::user();
            return $user->goals;
        }


}
