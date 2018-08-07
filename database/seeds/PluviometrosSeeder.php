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
         	'pluviometroId' => '2018-prae-01',
            'latitude' => '-8,014466',
            'longitude' => '-34,947309',
            'data_instalacao' => date("2018-07-05"),
            'modelo_id' => 1,
           

        ]);

         DB::table('pluviometro')->insert([
         	'pluviometroId' => '2018-prae-02',
            'latitude' => '-8,014466',
            'longitude' => '-34,947309',
           'data_instalacao' => date("2018-07-05"),
           'modelo_id' => 2,

        ]);

          DB::table('pluviometro')->insert([
          	'pluviometroId' => '2018-dois-irmaos-01',
            'latitude' => '-8,01907',
            'longitude' => '-34,955107',
            'data_instalacao' => date("2018-07-05"),
            'modelo_id' => 1,
           

        ]);

          DB::table('pluviometro')->insert([
          	'pluviometroId' => '2018-nazare-01',
            'latitude' => '-8,287901',
            'longitude' => '-38,354654',
            'data_instalacao' => date("2018-07-05"),
            'modelo_id' => 1,
           

        ]);

           DB::table('pluviometro')->insert([
          	'pluviometroId' => '2018-nazare-02',
            'latitude' => '-8,283754',
            'longitude' => '-38,347181',
            'data_instalacao' => date("2018-07-05"),
            'modelo_id' => 1,
           

        ]);

            DB::table('pluviometro')->insert([
          	'pluviometroId' => '2018-nazare-03',
            'latitude' => '-8,288639',
            'longitude' => '-38,343951',
            'data_instalacao' => date("2018-07-05"),
            'modelo_id' => 1,
           

        ]);

            DB::table('pluviometro')->insert([
          	'pluviometroId' => '2010-pesqueira-01',
            'latitude' => '-8,422467',
            'longitude' => '-36,883624',
            'data_instalacao' => date("2018-07-05"),
            'modelo_id' => 7,
           
        ]);

            DB::table('pluviometro')->insert([
          	'pluviometroId' => '2010-pesqueira-02',
            'latitude' => '-8,280752',
            'longitude' => '-36,571642',
            'data_instalacao' => date("2018-07-05"),
            'modelo_id' => 7,
           
        ]);

          DB::table('pluviometro')->insert([
          	'pluviometroId' => '2010-pesqueira-03',
            'latitude' => '-8,395799',
            'longitude' => '-36,860488',
            'data_instalacao' => date("2018-07-05"),
            'modelo_id' => 7,
           
        ]);

          DB::table('pluviometro')->insert([
          	'pluviometroId' => '2010-pesqueira-05',
            'latitude' => '-8,414339',
            'longitude' => '-36,863448',
            'data_instalacao' => date("2018-07-05"),
            'modelo_id' => 1,
           
        ]);

          DB::table('pluviometro')->insert([
          	'pluviometroId' => '2010-pesqueira-06',
            'latitude' => '-8,403065',
            'longitude' => '-36,988067',
            'data_instalacao' => date("2018-07-05"),
            'modelo_id' => 1,
           
        ]);

           DB::table('pluviometro')->insert([
          	'pluviometroId' => '2010-pesqueira-07',
            'latitude' => '-8,41189',
            'longitude' => '-36,953729',
            'data_instalacao' => date("2018-07-05"),
            'modelo_id' => 1,
           
        ]);

           DB::table('pluviometro')->insert([
          	'pluviometroId' => '2010-pesqueira-07',
            'latitude' => '-8,41189',
            'longitude' => '-36,953729',
            'data_instalacao' => date("2018-07-05"),
            'modelo_id' => 1,
           
        ]);

           DB::table('pluviometro')->insert([
          	'pluviometroId' => '2010-pesqueira-08',
            'latitude' => '-8,424478',
            'longitude' => '-36,884837',
            'data_instalacao' => date("2018-07-05"),
            'modelo_id' => 4,
           
        ]);

           DB::table('pluviometro')->insert([
          	'pluviometroId' => '2014-automático-01',
            'latitude' => '-8,280752',
            'longitude' => '-36,571642',
            'data_instalacao' => date("2018-07-05"),
            'modelo_id' => 6,
           
        ]);

           DB::table('pluviometro')->insert([
          	'pluviometroId' => '2014-automático-02',
            'latitude' => '-8,403065',
            'longitude' => '-36,988067',
            'data_instalacao' => date("2018-07-05"),
            'modelo_id' => 6,
           
        ]);

           DB::table('pluviometro')->insert([
          	'pluviometroId' => '2014-automático-03',
            'latitude' => '-8,41189',
            'longitude' => '-36,953729',
            'data_instalacao' => date("2018-07-05"),
            'modelo_id' => 6,
           
        ]);

           DB::table('pluviometro')->insert([
          	'pluviometroId' => '2014-automático-04',
            'latitude' => '-8,387031',
            'longitude' => '-36,909605',
            'data_instalacao' => date("2018-07-05"),
            'modelo_id' => 6,
           
        ]);

           DB::table('pluviometro')->insert([
          	'pluviometroId' => '2014-automático-05',
            'latitude' => '-8,33765',
            'longitude' => '-36,951186',
            'data_instalacao' => date("2018-07-05"),
            'modelo_id' => 6,
           
        ]);

           DB::table('pluviometro')->insert([
          	'pluviometroId' => '2014-automático-05',
            'latitude' => '-8,39496',
            'longitude' => '-36,865096',
            'data_instalacao' => date("2018-07-05"),
            'modelo_id' => 5,
           
        ]);



    }
}
