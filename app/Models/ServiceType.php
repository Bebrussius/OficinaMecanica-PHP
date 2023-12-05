<?php

// app/Models/ServiceType.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    protected $table = 'tiposdeservico';
    protected $primaryKey = 'servicoId';
    public $timestamps = true;

    protected $fillable = [
        'descricao',
        'preco',
        'Tipo',
    ];
}