<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $table = ("pecas");

    protected $primaryKey = 'idPeca'; // Defina a chave primária conforme necessário
    protected $fillable = ['nome', 'descricao', 'preco', 'quantidade'];

    public function serviceOrders()
    {
        return $this->hasMany(ServiceOrder::class, 'idPeca'); // Replace 'part_id' with your actual foreign key column name
    }
}