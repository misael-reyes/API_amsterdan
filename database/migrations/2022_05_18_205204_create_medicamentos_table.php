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
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id('id_medicamento');
            $table->string('nombre_medicamento', 50);
            $table->string('via_administracion', 30);
            $table->string('valor_medida', 20);
            $table->unsignedBigInteger('horario_id')->nullable();
            $table->unsignedBigInteger('medida_id')->nullable();
            $table->foreign('horario_id')
                ->references('id_horario')
                ->on('horarios')
                ->onDelete('set null');
            $table->foreign('medida_id')
                ->references('id_medida')
                ->on('medidas')
                ->onDelete('set null');
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
        Schema::dropIfExists('medicamentos');
    }
};
