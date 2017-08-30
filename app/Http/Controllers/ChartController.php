<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $players = Player::all();

        $honorPlayers = DB::table('player_honor')->get()->pluck('player_id')->toArray();
        $toDrawPlayers  = $players->reject(function ($player, $key) use ($honorPlayers) {
            return in_array($player->id, $honorPlayers);
        });

        $chartsData = Player::getChartData();
        return view('chart', compact('players', 'chartsData', 'toDrawPlayers'));
    }
}
