<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reg = 1;

        while($reg <= 4) {
            $d = date('d') + 1;
            $dc = date('d') + 5;
            DB::table('agenda')->insert([
                'id' => $reg,
                'idResp' => $reg,
                'dtInicio' => date('Y/m/'.$d.' H:i:s'),
                'dtFinal' => date('Y/m/'.$dc.' H:i:s'),
                'status' => 0,
                'titulo' => "Agenda " . $reg,
                'descricao' => "Descrição da agenda " . $reg . ".",
                'created_at' => date('Y/m/'.$d.' H:i:s')
            ]);
            $reg = $reg + 1;
        }
    }
}
