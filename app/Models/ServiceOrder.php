<?php

// app/Models/ServiceOrder.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    protected $table = 'ordensservico';
    protected $primaryKey = 'idOrdem';
    public $timestamps = true;

    protected $fillable = [
        'dataEntrada',
        'idCliente',
        'idVeiculo',
        'idMecanico',
        'servicoId',
        'idPeca',
        'defeito', // Certifique-se de incluir a coluna defeito aqui
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'idCliente');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'idVeiculo');
    }

    public function mechanic()
    {
        return $this->belongsTo(Mechanic::class, 'idMecanico');
    }

    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class, 'servicoId');
    }

    public function part()
    {
        return $this->belongsTo(Part::class, 'idPeca');
    }

}


