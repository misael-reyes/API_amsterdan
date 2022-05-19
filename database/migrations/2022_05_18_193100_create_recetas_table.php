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
        Schema::create('recetas', function (Blueprint $table) {
            $table->id('id_receta');
            $table->unsignedBigInteger('medico_id')->nullable();
            $table->unsignedBigInteger('paciente_id')->nullable();
            $table->foreign('medico_id')
                ->references('id_medico')
                ->on('medicos')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreign('paciente_id')
                ->references('id_paciente')
                ->on('pacientes')
                ->onDelete('set null')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('recetas');
    }
};
