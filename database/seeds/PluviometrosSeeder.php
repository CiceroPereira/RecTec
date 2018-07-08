<?php

use Illuminate\Database\Seeder;

class PluviometrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('pluviometro')->insert([
            'latitude' => '-8.019072',
            'longitude' => '-34.955091',
            'data_instalacao' => date("2018-07-05"),
            'modelo_id' => 1,
           

        ]);

         DB::table('pluviometro')->insert([
            'latitude' => '-8.021074',
            'longitude' => '-34.952724',
           'data_instalacao' => date("2018-07-05"),
           'modelo_id' => 1,

        ]);

          DB::table('pluviometro')->insert([
            'latitude' => '-8.287901',
            'longitude' => '-38.354654',
            'data_instalacao' => date("2018-07-05"),
            'modelo_id' => 1,
           

        ]);


          DB::table('pluviometro')->insert([
            'latitude' => '-8.283754',
            'longitude' => '-38.347181',
            'data_instalacao' => date("2018-07-05"),
            'modelo_id' => 1,
           

        ]);

          DB::table('pluviometro')->insert([
            'latitude' => '-8.288639',
            'longitude' => '-38.343951',
           'data_instalacao' => date("2018-07-05"),
           'modelo_id' => 1,

        ]);

          DB::table('pluviometro')->insert([
            'latitude' => '-8.014466',
            'longitude' => '-34.947309',
           'data_instalacao' => date("2018-07-05"),
           'modelo_id' => 1,

        ]);
    }
}
