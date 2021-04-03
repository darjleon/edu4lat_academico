<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_type_id');
            $table->foreign('activity_type_id')
                ->references('id')
                ->on('activities_types');
            $table->enum('area', ['Matematicas', 'Lenguaje', 'Sociales', 'Naturales', 'Historia']);
            $table->enum('nivel', ['Inicial', 'Basica', 'Medio', 'Bachillerato']);
            $table->text('enunciado');
            $table->json('opciones')->nullable();
            $table->json('respuesta')->nullable();
            $table->text('adjunto')->nullable();
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
        Schema::dropIfExists('activities');
    }
}
