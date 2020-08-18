<?php

namespace App\Repositorio;

use Illuminate\Database\Eloquent\Model;

class ContaCorrente extends Model
{
    protected $table = "conta_correntes";

    protected $fillable = [
        'id',
        'conta',
        'saldo',
    ];
}
