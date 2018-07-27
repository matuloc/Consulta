<?php

use Illuminate\Database\Seeder;
use App\Estado;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->delete();

        Estado::create([
          'nombre_estado' => 'Activo',
          'created_at' => date('Y-m-d h:i:s')
        ]);
        Estado::create([
          'nombre_estado' => 'Inactivo',
          'created_at' => date('Y-m-d h:i:s')
        ]);
    }
}
