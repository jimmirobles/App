<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('folio');
            $table->date('fecha');
            $table->integer('id_empresa');
            $table->string('hInicial', 50);
            $table->string('hFinal', 50);
            $table->text('error')->nullable();
            $table->text('solucion')->nullable();
            $table->text('comentarios')->nullable();
            $table->integer('id_asesor');
            $table->integer('id_servicio');
            $table->boolean('estado')->default(false);
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
        Schema::dropIfExists('documentos');
    }
}
