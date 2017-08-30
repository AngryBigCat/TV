<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $players = Player::all();
        $chartsData = Player::getChartData();
        return view('chart', compact('players', 'chartsData'));
    }
}
