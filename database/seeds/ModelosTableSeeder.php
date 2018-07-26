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
            'descricao' => 'Pluviometro manual do las feito com pet'
        ]);

        DB::table('modelo')->insert([
            'tipo' => 'manual-las-pvc-01',
            'descricao' => 'Pluviometro manual do las feito com pvc'
        ]);

        DB::table('modelo')->insert([
            'tipo' => 'manual-las-pvc-02',
            'descricao' => 'Pluviometro manual do las feito com pvc'
        ]);

        DB::table('modelo')->insert([
            'tipo' => 'automatico-campebbel-01',
            'descricao' => 'Pluviometro automático Campebbel'
        ]);

         DB::table('modelo')->insert([
            'tipo' => 'automatico-onset-01',
            'descricao' => 'Pluviometro automático Onset'
        ]);

         DB::table('modelo')->insert([
            'tipo' => 'manual-omh-01',
            'descricao' => 'Pluviometro manual omh'
        ]);

          DB::table('modelo')->insert([
            'tipo' => 'manual- -01',
            'descricao' => 'Pluviometro manual'
        ]);
    }
}
