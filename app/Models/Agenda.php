<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Agenda extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = "agenda";

    protected $fillable = [
        'idResp',
        'dtInicio',
        'dtFinal',
        'dtConclusao',
        'status',
        'titulo',
        'descricao'
    ];
}
