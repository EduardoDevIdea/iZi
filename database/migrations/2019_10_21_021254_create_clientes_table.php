<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 15);
            $table->string('sobrenome', 50);
            $table->enum('tipo', ['pessoa fisica', 'pessoa juridica']);
            $table->string('email');
            $table->string('telefone');
            $table->string('endereco', 50);
            $table->unsignedBigInteger('user_id'); //RETIRAR O nullable quando descobrir jeito de passar o valor dessa campo 
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
