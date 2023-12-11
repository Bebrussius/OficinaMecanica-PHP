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

    public function serviceOrders()
    {
        return $this->hasMany(ServiceOrder::class, 'idPeca'); // Replace 'part_id' with your actual foreign key column name
    }
}