<?php

// app/Models/Mechanic.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    use HasFactory;

    protected $table = ("mecanicos");

    protected $primaryKey = 'idMecanico'; // Se necessário, ajuste conforme sua tabela
    protected $fillable = ['nome', 'especializacao'];

    // Relacionamento com Ordens de Serviço
    public function serviceOrders()
    {
        return $this->hasMany(ServiceOrder::class, 'idMecanico');
    }
}


