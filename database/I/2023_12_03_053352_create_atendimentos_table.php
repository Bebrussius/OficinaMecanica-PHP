<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtendimentosTable extends Migration
{
    public function up()
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->id('idAtendimento');
            $table->foreignId('idOrdem')->nullable()->constrained('ordensservico', 'idOrdem');
            $table->foreignId('idMecanico')->nullable()->constrained('mecanicos', 'idMecanico');
            $table->date('dataAtendimento')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('atendimentos');
    }
}
