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
            $table->enum('area', ['Matematicas', 'Lengua y Literatura', 'Ciencias Sociales', 'Ciencias Naturales']);
            $table->enum('nivel', ['2do grado', '3ero grado', '4to grado', '5to grado', '6to grado', '7mo grado', '8vo grado', '9no grado', '10mo grado']);
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
