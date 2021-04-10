<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creador_id');
            $table->foreign('creador_id')
                ->references('id')
                ->on('users');
            $table->text('curso')->nullable();
            $table->enum('area', ['Matematicas', 'Lengua y Literatura', 'Ciencias Sociales', 'Ciencias Naturales']);
            $table->enum('nivel', ['2do grado', '3ero grado', '4to grado', '5to grado', '6to grado', '7mo grado', '8vo grado', '9no grado', '10mo grado']);
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->date('fecha');
            $table->Time('inicio');
            $table->Time('fin');
            $table->enum('estado', ['Pendiente', 'Realizada'])->default('Pendiente');
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
        Schema::dropIfExists('quizzes');
    }
}
