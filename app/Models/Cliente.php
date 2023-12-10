<?php

namespace App\Models;       //Define o namespace do modelo dentro do diretório App\Models

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model     //Declara a classe Cliente, que estende a classe base Model do Eloquent.
{
    protected $fillable = [     //Especifica os atributos que podem ser preenchidos em massa
        'nome',
        'data_nascimento',
        'cpf_cnpj',
        'foto',
        'nome_social',
    ];

    use HasFactory;
}
