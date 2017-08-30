<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Honor extends Model
{
    public $timestamps = false;

    public function players()
    {
        return $this->belongsToMany('App\Player', 'player_honor', 'honor_id', 'player_id');
    }
}
