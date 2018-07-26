<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Cícero Lima',
            'email' => 'cicerojrlima@gmail.com',
            'password' => bcrypt('secret'),
            'cpf' => '10338116451',
            'endereco' => 'recife',
            'id_profissao' => 1,
            'id_perfil' => 1,

        ]);

        DB::table('users')->insert([
            'name' => 'Aílton',
            'email' => 'ailtonalvesst@hotmail.com',
            'password' => bcrypt('secret'),
            'cpf' => '65051868088',
            'endereco' => 'recife',
            'id_profissao' => 1,
            'id_perfil' => 1,

        ]);
    }
}
