<?php

namespace App\Http\Controllers;

use App\Honor;
use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LuckController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {/*
        $honor1 = Honor::find(1)->players()->paginate(10);
        $honor2 = Honor::find(2)->players()->paginate(10);
        $honor3 = Honor::find(3)->players()->paginate(10);
        return view('luck', compact('honor1', 'honor2', 'honor3'));*/
    }

    public function show($id)
    {
        $var = '';
        switch ($id) {
            case 1:
                $var = 'danger';
                $str = '一';
                break;
            case 2:
                $var = 'success';
                $str = '二';
                break;
            case 3:
                $var = 'info';
                $str = '三';
                break;
        }
        $honor = Honor::find($id)->players()->paginate(10);
        return view('honor', compact('honor', 'var', 'id', 'str'));
    }

    public function drawLucky(Request $request)
    {

        $num = $request->input('num');
        $honor_id = $request->input('honor_id');
        $players = Player::all();
        if ($num > $players->count()) {
            return back()->with('error', '您输入的参数大于总参与人数');
        }

        //删除已抽过奖的用户
        DB::table('player_honor')->where('honor_id', $honor_id)->delete();

        $randPlayer = $players->random($num);
        if ($randPlayer->isEmpty()) {
            return response()->json('用户为空', 404);
        }
        foreach ($randPlayer as $player) {
            DB::table('player_honor')->insert(
                ['player_id' => $player->id, 'honor_id' => $honor_id]
            );
        }
        return redirect()->back();
    }
}
