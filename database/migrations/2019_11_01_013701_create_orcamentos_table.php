<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrcamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orcamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo', 30);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->text('descricao');
            //Campo "material" - ver como serão armazenados os dados de material, nessa tabela ou apenas na tabela "material"
            //Campo "servico" - ver como vai ser armazenado
            //Campo "data" - pegar automaticamente - fazer este campo ou utilizar o timestamp criado automaticamente?
            $table->tinyInteger('prazo'); //Campo "Prazo" - armazena o tempo em dias que o serviço será realizado
            $table->enum('status', ['enviado', 'aprovado', 'reprovado', 'concluido', 'atrasado', 'cancelado'])->nullable();//após salvar o orçamento, ter a opção selecionar o status e salvar no BD
            $table->float('valor');
            $table->float('total')->nullable();//Campo total = (valor + material + serviço) - tirar o nullable quando descobrir como pegar o valor da tabela serviço
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
        Schema::dropIfExists('orcamentos');
    }
}
