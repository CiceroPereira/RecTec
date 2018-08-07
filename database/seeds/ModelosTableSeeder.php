<?php

use Illuminate\Database\Seeder;

class ModelosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modelo')->insert([
            'tipo' => 'manual-las-pet-01',
            'descricao' => 'Pluviômetro feito com garrafa PET de 2 litros'
        ]);

        DB::table('modelo')->insert([
            'tipo' => 'manual-las-pvc-01',
            'descricao' => 'Pluviômetro feito com conexões de PVC, com redução e funil'
        ]);

        DB::table('modelo')->insert([
            'tipo' => 'manual-las-pvc-02',
            'descricao' => 'Pluviômetro feito com conexões de PVC, sem redução e funil'
        ]);

        DB::table('modelo')->insert([
            'tipo' => 'manual-copp-pvc-01',
            'descricao' => 'Pluviômetro de copo, construído em plástico cristal, formato afunilado'
        ]);

        DB::table('modelo')->insert([
            'tipo' => 'automatico-campebbel-01',
            'descricao' => 'Pluviômetro do tipo báscula com sensor eletrônico '
        ]);

         DB::table('modelo')->insert([
            'tipo' => 'automatico-onset-01',
            'descricao' => 'Pluviômetro do tipo báscula com sensor eletrônico '
        ]);

         DB::table('modelo')->insert([
            'tipo' => 'manual-omh-01',
            'descricao' => 'pluviometro ville de paris'
        ]);
    }
}
