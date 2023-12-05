<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItensOrdemServicoTable extends Migration
{
    public function up()
    {
        Schema::create('itensordemservico', function (Blueprint $table) {
            $table->id('idItem');
            $table->foreignId('idOrdem')->constrained('ordensservico', 'idOrdem');
            $table->foreignId('servicoId')->constrained('tiposdeservico', 'servicoId');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('itensordemservico');
    }
}
