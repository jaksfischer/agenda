<?php

namespace App\Repositories;

use App\Models\Agenda;
use Carbon\Carbon;

class AgendaRepository
{
    public function getByIdAndDate($dados)
    {
        return Agenda::where('idResp', $dados['idResp'])
            ->where('dtInicio', 'LIKE', '%'.date('Y-m-d', strtotime($dados['dtInicio'])).'%')
            ->count();
    }

    public function create($data)
    {
        return Agenda::create([
            'idResp'        => $data['idResp'],
            'dtInicio'      => $data['dtInicio'],
            'dtFinal'       => $data['dtFinal'],
            'dtConclusao'   => NULL,
            'status'        => $data['status'],
            'titulo'        => $data['titulo'],
            'descricao'     => $data['descricao']
        ]);
    }

    public function getById($id)
    {
        return Agenda::find(['id', $id]);
    }

    public function edit($data)
    {
        return Agenda::where('id', $data['id'])
            ->update([
                'idResp'        => $data['idResp'],
                'dtInicio'      => $data['dtInicio'],
                'dtFinal'       => $data['dtFinal'],
                'dtConclusao'   => $data['dtConclusao'],
                'status'        => $data['status'],
                'titulo'        => $data['titulo'],
                'descricao'     => $data['descricao']
            ]);
    }

    public function destroy($id)
    {
        return Agenda::where('id', $id)
            ->update([
                'deleted_at' => now()
            ]);
    }

    public function showByPerson($id)
    {
        return Agenda::where('idResp', $id)
        ->get();
    }

    public function visualizarIntervalo($dates)
    {
        $dtInicio = Carbon::parse($dates['dtInicio']);
        $dtFinal = Carbon::parse($dates['dtFinal'] . '23:59:59');

        return Agenda::whereBetween('dtInicio', [$dtInicio, $dtFinal])
            ->orWhereBetween('dtFinal', [$dtInicio, $dtFinal])
            ->get();
    }
}
