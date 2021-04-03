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
            $table->string('curso')->nullable();
            $table->enum('area', ['Matematicas', 'Lenguaje', 'Sociales', 'Naturales', 'Historia']);
            $table->enum('nivel', ['Inicial', 'Basica', 'Medio', 'Bachillerato']);
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->dateTime('inicio');
            $table->dateTime('fin');
            $table->enum('estado', ['Sin realizar', 'Realizada'])->default('Sin realizar');
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
