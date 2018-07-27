<?php

use Illuminate\Database\Seeder;
use App\Hora_disponible;

class Hora_disponibleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hora_disponible')->delete();

        Hora_disponible::create([
          'hora' => '08:00',
          'created_at' => date('Y-m-d h:i:s')
        ]);
        Hora_disponible::create([
          'hora' => '09:40',
          'created_at' => date('Y-m-d h:i:s')
        ]);
        Hora_disponible::create([
          'hora' => '11:20',
          'created_at' => date('Y-m-d h:i:s')
        ]);
        Hora_disponible::create([
          'hora' => '13:00',
          'created_at' => date('Y-m-d h:i:s')
        ]);
        Hora_disponible::create([
          'hora' => '14:40',
          'created_at' => date('Y-m-d h:i:s')
        ]);
        Hora_disponible::create([
          'hora' => '16:20',
          'created_at' => date('Y-m-d h:i:s')
        ]);
        Hora_disponible::create([
          'hora' => '18:00',
          'created_at' => date('Y-m-d h:i:s')
        ]);
        Hora_disponible::create([
          'hora' => '19:40',
          'created_at' => date('Y-m-d h:i:s')
        ]);
        Hora_disponible::create([
          'hora' => '21:20',
          'created_at' => date('Y-m-d h:i:s')
        ]);
    }
}
