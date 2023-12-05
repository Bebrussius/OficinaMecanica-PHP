<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pecas', function (Blueprint $table) {
            $table->id('idPeca');
            $table->string('nome')->nullable();
            $table->string('descricao')->nullable();
            $table->integer('preco')->nullable();
            $table->integer('quantidade')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pecas');
    }
};