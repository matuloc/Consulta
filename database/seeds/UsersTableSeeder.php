<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([
          'id_usuario' => '18501771_matt',
          'name' => 'Matt',
          'rut' => '18501771',
          'tipo' => '1',
          'estado' => '1',
          'email' => 'matulo.castro@gmail.com',
          'password' => bcrypt('admin123'),
          'created_at' => date('Y-m-d h:i:s')
        ]);
        User::create([
          'id_usuario' => '18750368_benja',
          'name' => 'Benja',
          'rut' => '18750368',
          'tipo' => '2',
          'estado' => '2',
          'email' => 'benja@gmail.com',
          'password' => bcrypt('usuario123'),
          'created_at' => date('Y-m-d h:i:s')
        ]);
    }
}
