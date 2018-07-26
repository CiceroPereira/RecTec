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
    	
    	DB::table('profissao')->insert([
            'descricao' => 'Professor'
        ]);

        DB::table('profissao')->insert([
            'descricao' => 'Aluno'
        ]);

        DB::table('profissao')->insert([
            'descricao' => 'Engenheiro'
        ]);

        DB::table('profissao')->insert([
            'descricao' => 'Agricultor'
        ]);

        DB::table('profissao')->insert([
            'descricao' => 'Outro'
        ]);


        DB::table('perfil')->insert([
            'descricao' => 'Administrador'
        ]);

        DB::table('perfil')->insert([
            'descricao' => 'Registrador'
        ]);
        
         $this->call(ModelosTableSeeder::class);
         $this->call(UsersTableSeeder::class);
      //   $this->call(PluviometrosSeeder::class); 
    }
}
