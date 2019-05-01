<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

//LLamos al modelo user para los datos
use \App\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**Este codigo tiene exactamente la misma funcionalidad que los de abajo
         * Usa el modelo de laravel User, pero Eloquent se encarga de completar las columnas create_at y update_at
        */
        User::create([
            'name' => 'Nicolás',
            'email' => 'nicolas@gmail.com',
            'password' => bcrypt('nicolas'),

        ]);
        // DB::table('users')->insert([
        //     'name' => 'Nicolás',
        //     'email' => 'nicolas@gmail.com',
        //     'password' => bcrypt('nicolas'),
        // ]);




            /**Genero datos de prueba
         * Laravel va a generar Listas de prueba de usuarios que le indique ahi
        */
        factory(\App\Lista::class)->create();

    }
}
