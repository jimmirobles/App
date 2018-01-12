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
            $table->integer('tipo');
            $table->integer('folio');
            $table->date('fecha');
            $table->integer('id_cliente');
            $table->string('razon_social', 100);
            $table->string('direccion', 100)->nullable();
            $table->string('contacto_nombre', 100);
            $table->string('contacto_email', 100);
            $table->string('hInicial', 50);
            $table->string('hFinal', 50);
            $table->text('error')->nullable();
            $table->text('solucion')->nullable();
            $table->text('comentarios')->nullable();
            $table->integer('id_asesor');
            $table->string('asesor_nombre', 100);
            $table->integer('id_servicio');
            $table->string('servicio_nombre', 50);
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
