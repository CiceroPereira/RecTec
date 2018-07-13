<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('modelo')->insert([
            'descricao' => 'XXX'
        ]);

    	DB::table('profissao')->insert([
            'descricao' => 'Professor'
        ]);

        DB::table('perfil')->insert([
            'descricao' => 'Administrador'
        ]);
        
         $this->call(UsersTableSeeder::class);
         $this->call(PluviometrosSeeder::class);
    }
}
