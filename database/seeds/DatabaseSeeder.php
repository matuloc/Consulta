<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        //Desactivar llaves foraneas para seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call('UsersTableSeeder');
        $this->call('BlogTableSeeder');
        $this->call('EspecialidadTableSeeder');
        $this->call('Hora_disponibleTableSeeder');
        $this->call('Hora_medicaTableSeeder');
        $this->call('PrevisionTableSeeder');
        $this->call('EstadosTableSeeder');
        $this->call('Tipo_UsuarioTableSeeder');
        $this->call('Estado_AtencionTableSeeder');

        // Activar Nuevamente llaves foraneas
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
