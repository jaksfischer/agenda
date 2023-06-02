<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoreController extends Controller
{
    public function messages(int $id)
    {
        $messages = [
            1 => "Não existem registros gravados no banco de dados até o momento.",
            2 => "Nenhum registro encontrado com este id, por favor tente com um id diferente.",
            3 => "A data de início não pode estar em um final de semana, por favor, tente outra data.",
            4 => "A data de finalização não pode estar em um final de semana, por favor, tente outra data.",
            5 => "Você está tentando adicionar uma atividade no mesmo dia de outra atividade já cadastrada para este usuário, por favor, escolha outra data.",
            6 => "Atividade adicionada ao usuário com sucesso.",
        ];

        return $messages[$id];
    }
}
