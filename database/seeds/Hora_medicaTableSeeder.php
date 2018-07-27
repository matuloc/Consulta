<?php

use Illuminate\Database\Seeder;
use App\Hora_medica;

class Hora_medicaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hora_medica')->delete();

        Hora_medica::create([
          'dia' => '2018-04-18',
          'hora' =>'08:00:00',
          'rut' => '18501771',
          'nombre' => 'matt',
          'id_paciente' => '18501771_matt',
          'id_especialidad' => '2',
          'id_prevision' => '1',
          'estado' => '1',
          'created_at' => date('Y-m-d h:i:s')
        ]);
        Hora_medica::create([
          'dia' => '2018-04-18',
          'hora' =>'10:00:00',
          'rut' => '18501771',
          'nombre' => 'matt',
          'id_paciente' => '18501771_matt',
          'id_especialidad' => '2',
          'id_prevision' => '1',
          'estado' => '1',
          'created_at' => date('Y-m-d h:i:s')
        ]);
        Hora_medica::create([
          'dia' => '2018-04-19',
          'hora' =>'08:00:00',
          'rut' => '18501771',
          'nombre' => 'matt',
          'id_paciente' => '18501771_matt',
          'id_especialidad' => '2',
          'id_prevision' => '1',
          'estado' => '1',
          'created_at' => date('Y-m-d h:i:s')
        ]);
    }
}
