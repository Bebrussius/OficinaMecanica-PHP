<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMecanicosTable extends Migration
{
    public function up()
    {
        Schema::create('mecanicos', function (Blueprint $table) {
            $table->id('idMecanico');
            $table->string('nome')->nullable();
            $table->string('especializacao')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mecanicos');
    }
}
