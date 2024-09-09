<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('user')->insert([
            ['name' => 'Esteban',
            'email' => 'esteban@gmail.com']
        ]);
       /*  $usuario = new User();

        $usuario->name = "Esteban";
        $usuario->email = "esteban@gmail.com";

        $usuario->save;
 */

    }
}
