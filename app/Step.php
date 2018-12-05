<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $fillable = [

        'id',

        'title',

        'deadline',

        'time_value'

        //'time_remaining'

    ];

    public function goal()
    {
      return $this->belongsTo('App\Goal');
    }
}
