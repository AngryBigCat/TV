<?php

use Illuminate\Database\Seeder;
use App\Player;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $select = ['A', 'B', 'C', 'D'];
        for ($i = 0; $i <= 50; $i++) {
            Player::create([
                'answer_1' => $select[mt_rand(0,3)],
                'answer_2' => $select[mt_rand(0,3)],
                'answer_3' => $select[mt_rand(0,3)],
                'answer_4' => str_random(50),
                'name' => str_random(10),
                'age' => mt_rand(1, 100),
                'phone' => '11111111111',
                'address' => '北京市昌平区'
            ]);
        }
    }
}
