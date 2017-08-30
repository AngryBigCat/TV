<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Player extends Model
{
    public function  honor()
    {
        return $this->belongsToMany('App\Honor', 'player_honor', 'player_id', 'honor_id');
    }
    public function getAnswersAttribute($answers)
    {
        $arr = explode('|', $answers);
        return $arr;
    }

    /**
     * 获取统计表所需的数据结构
     * @param $players
     */
    public static function getChartData()
    {
        $arr = [
            [0,0,0], //A
            [0,0,0], //B
            [0,0,0], //C
            [0,0,0]  //D
        ];
        $answer_1 = DB::table('players')->pluck('answer_1');
        foreach ($answer_1 as $value) {
            switch ($value) {
                case 'A':
                    $arr[0][0]++;
                    break;
                case 'B':
                    $arr[1][0]++;
                    break;
                case 'C':
                    $arr[2][0]++;
                    break;
                case 'D':
                    $arr[3][0]++;
                    break;
            }
        }
        $answer_2 = DB::table('players')->pluck('answer_2');
        foreach ($answer_2 as $value) {
            switch ($value) {
                case 'A':
                    $arr[0][1]++;
                    break;
                case 'B':
                    $arr[1][1]++;
                    break;
                case 'C':
                    $arr[2][1]++;
                    break;
                case 'D':
                    $arr[3][1]++;
                    break;
            }
        }
        $answer_3 = DB::table('players')->pluck('answer_3');
        foreach ($answer_3 as $value) {
            switch ($value) {
                case 'A':
                    $arr[0][2]++;
                    break;
                case 'B':
                    $arr[1][2]++;
                    break;
                case 'C':
                    $arr[2][2]++;
                    break;
                case 'D':
                    $arr[3][2]++;
                    break;
            }
        }
        return $arr;
    }

    private static function processPluck($answers)
    {
    }
}
