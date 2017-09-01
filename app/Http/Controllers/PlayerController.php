<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerRequest;
use App\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(PlayerRequest $request)
    {
        $player = Player::create($request->except('_token'));
        return [
            'code' => 0,
            'player' => $player
        ];
    }
}
