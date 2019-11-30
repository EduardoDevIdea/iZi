<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModificaOrcamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orcamentos', function(Blueprint $table){
            $table->dropColumn('status');
        });

        Schema::table('orcamentos', function(Blueprint $table){
            $table->enum('status', ['enviado', 'aprovado', 'reprovado'])->nullable();
            $table->date('inicio')->nullable();
            $table->enum('servico', ['concluido', 'atrasado', 'cancelado'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
