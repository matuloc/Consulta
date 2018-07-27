<?php

use Illuminate\Database\Seeder;
use App\Prevision;

class PrevisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prevision')->delete();

        Prevision::create([
          'nombre_prevision' => 'Fonasa',
          'disponible' => '1',
          'created_at' => date('Y-m-d h:i:s')
        ]);
        Prevision::create([
          'nombre_prevision' => 'Colmena',
          'disponible' => '1',
          'created_at' => date('Y-m-d h:i:s')
        ]);
    }
}
