<?php

use Illuminate\Database\Seeder;
use App\Estado_Atencion;

class Estado_AtencionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado_Atencion::create([
          'nombre_estado_atencion' => 'Atendido',
          'created_at' => date('Y-m-d h:i:s')
        ]);
        Estado_Atencion::create([
          'nombre_estado_atencion' => 'Pendiente',
          'created_at' => date('Y-m-d h:i:s')
        ]);
        Estado_Atencion::create([
          'nombre_estado_atencion' => 'Cancelado',
          'created_at' => date('Y-m-d h:i:s')
        ]);
    }
}
