<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = ("clientes");

    protected $primaryKey = 'idCliente'; // Se necessário, ajuste conforme sua tabela
    protected $fillable = ['nome', 'telefone', 'email', 'endereco'];

    // Relacionamento com Veículos
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'idCliente');
    }

    // Relacionamento com Ordens de Serviço
    public function serviceOrders()
    {
        return $this->hasMany(ServiceOrder::class, 'idCliente');
    }
}
