<?php

use Illuminate\Database\Seeder;
use App\Especialidad;

class EspecialidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('especialidad')->delete();

        Especialidad::create([
          'nombre_especialidad' => 'neurología',
          'descripcion' => 'neurología neurología',
          'disponible' => '1',
          'created_at' => date('Y-m-d h:i:s')
        ]);
        Especialidad::create([
          'nombre_especialidad' => 'neurociencia',
          'descripcion' => 'neurociencia neurociencia',
          'disponible' => '1',
          'created_at' => date('Y-m-d h:i:s')
        ]);
    }
}
