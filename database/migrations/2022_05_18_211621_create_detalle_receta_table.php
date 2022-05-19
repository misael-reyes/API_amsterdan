<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_receta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receta_id');
            $table->unsignedBigInteger('medicamento_id');
            $table->date('fecha');
            $table->foreign('receta_id')
                ->references('id_receta')
                ->on('recetas')
                ->onDelete('cascade');
            $table->foreign('medicamento_id')
                ->references('id_medicamento')
                ->on('medicamentos')
                ->onDelete('cascade');
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
        Schema::dropIfExists('detalle_receta');
    }
};
