<?php

namespace App\Http\Controllers;

use App\Honor;
use App\Http\Requests\DrawLuckyRequest;
use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class LuckController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function export($id)
    {
        if ($id == 'all') {
            Excel::create('所有中奖用户', function($excel) {
                $honors = Honor::all();
                foreach ($honors as $key => $honor) {
                    $data = [
                        ['用户ID', '奖品', '姓名', '性别', '手机', '地址', '题1','题2', '题3', '题4', '抽奖时间', '提交时间'],
                    ];
                    foreach ($honor->players as $player) {
                        array_push($data, [
                            $player->id,
                            $honor->name,
                            $player->name,
                            $player->sex,
                            $player->phone,
                            $player->address,
                            $player->answer_1,
                            $player->answer_2,
                            $player->answer_3,
                            $player->answer_4,
                            $player->pivot->created_at,
                            $player->created_at,
                        ]);
                    }
                    $excel->sheet((1 + $key).'等奖用户', function($sheet) use ($data) {
                        $sheet->fromArray($data);
                    });
                }
            })->download('xlsx');

        } else {

            Excel::create($id.'等奖用户', function($excel) use ($id)  {
                $honor = Honor::find($id);
                $data = [
                    ['用户ID', '奖品', '姓名', '手机', '地址', '题1','题2', '题3', '题4', '抽奖时间', '提交时间'],
                ];
                foreach ($honor->players as $player) {
                    array_push($data, [
                        $player->id,
                        $honor->name,
                        $player->name,
                        $player->phone,
                        $player->address,
                        $player->answer_1,
                        $player->answer_2,
                        $player->answer_3,
                        $player->answer_4,
                        $player->pivot->created_at,
                        $player->created_at,
                    ]);
                }
                $excel->sheet('sheet1', function($sheet) use ($data) {
                    $sheet->fromArray($data);
                });
            })->download('xlsx');
        }
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
        $players = Honor::find($id)->players;
        return view('honor', compact('players', 'var', 'id', 'str'));
    }

    public function drawLucky(DrawLuckyRequest $request)
    {
        $num = $request->input('num');
        $honor_id = $request->input('honor_id');

        //删除已抽过奖的用户
        DB::table('player_honor')->where('honor_id', $honor_id)->delete();

        //过滤已抽奖的用户
        $players = Player::all();
        $honorPlayers = DB::table('player_honor')->get()->pluck('player_id')->toArray();
        $filtered  = $players->reject(function ($player, $key) use ($honorPlayers) {
            return in_array($player->id, $honorPlayers);
        });

        if ($num > $filtered->count()) {
            return back()->with('error', '您输入的参数大于总参与人数或剩余人数');
        }

        //从已过滤的抽过奖的用户随机抽$num个人
        $randPlayer = $filtered->random($num);

        $time = date('Y-m-d H:i:s', time());
        //将幸运用户插入数据库
        foreach ($randPlayer as $player) {
            DB::table('player_honor')->insert(
                ['player_id' => $player->id, 'honor_id' => $honor_id, 'created_at' => $time]
            );
        }

        return back();
    }
}
