<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = ("veiculos");

    protected $primaryKey = 'idVeiculo'; // Se necessário, ajuste conforme sua tabela
    protected $fillable = ['marca', 'modelo', 'ano', 'placa', 'idCliente'];

    // Relacionamento com Clientes
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'idCliente');
    }
}
