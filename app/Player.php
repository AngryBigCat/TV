<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public function getAnswersAttribute($answers)
    {
        $arr = explode('|', $answers);
        return $arr;
    }
}
