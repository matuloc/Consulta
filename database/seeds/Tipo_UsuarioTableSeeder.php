<?php

use Illuminate\Database\Seeder;
use App\Tipo_Usuario;

class Tipo_UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_usuario')->delete();

        Tipo_Usuario::create([
          'Tipo' => 'Administrador',
          'created_at' => date('Y-m-d h:i:s')
        ]);
        Tipo_Usuario::create([
          'Tipo' => 'Usuario nivel-1',
          'created_at' => date('Y-m-d h:i:s')
        ]);
    }
}
