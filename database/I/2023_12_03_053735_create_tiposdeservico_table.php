<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposDeServicoTable extends Migration
{
    public function up()
    {
        Schema::create('tiposdeservico', function (Blueprint $table) {
            $table->id('servicoId');
            $table->string('descricao')->nullable();
            $table->double('preco')->nullable();
            $table->string('Tipo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tiposdeservico');
    }
}
