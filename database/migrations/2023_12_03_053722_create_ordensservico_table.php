<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdensServicoTable extends Migration
{
    public function up()
    {
        Schema::create('ordensservico', function (Blueprint $table) {
            $table->id('idOrdem');
            $table->foreignId('idCliente')->nullable()->constrained('clientes', 'idCliente');
            $table->foreignId('idVeiculo')->nullable()->constrained('veiculos', 'idVeiculo');
            $table->foreignId('servicoId')->nullable()->constrained('tiposdeservico', 'servicoId');
            $table->foreignId('idMecanico')->nullable()->constrained('mecanicos', 'idMecanico');
            $table->foreignId('idPeca')->nullable()->constrained('pecas', 'idPeca');
            $table->date('dataEntrada')->nullable();
            $table->string('defeito')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ordensservico');
    }
}
