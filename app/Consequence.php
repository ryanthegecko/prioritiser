<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consequence extends Model
{
    protected $fillable = [

        'id',

        'title',

        'goal_id',

        'sector_id',

        'value'

    ];

    public function sector()
    {
      return $this->belongsTo('App\Sector');
    }

    public function goal()
    {
      return $this->belongsTo('App\Goal');
    }
}
