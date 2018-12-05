<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = [

        'id',

        'title',

        'value',

        'shelf_id',

        'completed',


    ];

    public function consequences()
    {
      return $this->hasMany('App\Consequence');
    }

    public function steps()
    {
      return $this->hasMany('App\Step');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function value() {
      $goal_value = 0;
      foreach ($this->consequences as $consequence) {
        $goal_value += $consequence->value;
      }

      return $goal_value;

    }


}
