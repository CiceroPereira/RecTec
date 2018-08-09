<?php

use Illuminate\Database\Seeder;

class PluviometriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'data' => date('02/05/2018'),
            'hora' => time('09:00'),
            'lamina' => 1.8,
            'user_id' =>  1,
            'pluviometro_id' => 1,
        ]);

          DB::table('users')->insert([
            'data' => date('03/05/2018'),
            'hora' => time('09:00'),
            'lamina' => 4.0,
            'user_id' =>  1,
            'pluviometro_id' => 1,
        ]);

          DB::table('users')->insert([
            'data' => date('04/05/2018'),
            'hora' => time('09:00'),
            'lamina' => 4.0,
            'user_id' =>  1,
            'pluviometro_id' => 1,
        ]);
    }
}
