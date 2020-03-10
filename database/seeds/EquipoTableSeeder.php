<?php

use App\Equipo;
use Illuminate\Database\Seeder;

class EquipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Equipo::create(['nombre_Equipo' => 'Prog. Internet']);
        Equipo::create(['nombre_Equipo' => 'Est. de Datos']);
    }
}
