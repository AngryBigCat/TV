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
        for ($i = 0; $i <= 50; $i++) {
            $select = ['A', 'B', 'C'];
            shuffle($select);
            $select = implode('|', $select);
            Player::create([
                'name' => str_random(10),
                'age' => mt_rand(1, 100),
                'phone' => '11111111111',
                'address' => '北京市昌平区',
                'answers' => $select.'|这是一个回答啊'
            ]);
        }
    }
}
