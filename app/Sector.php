<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = [

        'id',

        'title',

        'weight',
    ];


    public function consequences()
    {
      return $this->hasMany('App\Consequence');
    }
}
