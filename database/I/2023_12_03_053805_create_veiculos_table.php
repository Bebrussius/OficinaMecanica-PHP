<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeiculosTable extends Migration
{
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id('idVeiculo');
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->integer('ano')->nullable();
            $table->string('placa')->nullable();
            $table->foreignId('idCliente')->nullable()->constrained('clientes', 'idCliente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('veiculos');
    }
}
