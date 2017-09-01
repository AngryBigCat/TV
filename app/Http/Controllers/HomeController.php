<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();
        return view('home', compact('players'));
    }

    public function getJson(Request $request)
    {
        $draw = $request->input('draw');
        $start = $request->input('start');
        $pageLength = $request->input('length');
        $orderColumn = $request->input('order')[0]['column'];
        $orderDir = $request->input('order')[0]['dir'];
        $search = $request->input('search')['value'];

        $total = Player::count();
        $column = '';
        switch ($orderColumn) {
            case 0:
                $column = 'id';
                break;
            case 1:
                $column = 'name';
                break;
            case 2:
                $column = 'age';
                break;
            case 3:
                $column = 'phone';
                break;
            case 4:
                $column = 'address';
                break;
            case 5:
                $column = 'answer_1';
                break;
            case 6:
                $column = 'answer_2';
                break;
            case 7:
                $column = 'answer_3';
                break;
            case 8:
                $column = 'answer_4';
                break;
            case 9:
                $column = 'created_at';
                break;
        }

        $players = Player::where('id', 'like', '%'.$search.'%')
            ->orWhere('name', 'like', '%'.$search.'%')
            ->orWhere('phone', 'like', '%'.$search.'%')
            ->orWhere('age', 'like', '%'.$search.'%')
            ->orWhere('address', 'like', '%'.$search.'%')
            ->orWhere('answer_1', 'like', '%'.$search.'%')
            ->orWhere('answer_2', 'like', '%'.$search.'%')
            ->orWhere('answer_3', 'like', '%'.$search.'%')
            ->orWhere('answer_4', 'like', '%'.$search.'%')
            ->orWhere('created_at', 'like', '%'.$search.'%')
            ->orderBy($column, $orderDir)
            ->offset($start)
            ->limit($pageLength)
            ->get();
        return [
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
            'data' => $players,
        ];
    }

    public function exportAll()
    {
        Excel::create('所有用户', function($excel)  {
            $players = Player::all();
            $data = [
                ['用户ID', '姓名', '手机', '地址', '题1','题2', '题3', '题4', '提交时间'],
            ];
            foreach ($players as $player) {
                array_push($data, [
                    $player->id,
                    $player->name,
                    $player->phone,
                    $player->address,
                    $player->answer_1,
                    $player->answer_2,
                    $player->answer_3,
                    $player->answer_4,
                    $player->created_at,
                ]);
            }
            $excel->sheet('sheet1', function($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download('xlsx');
    }
}
