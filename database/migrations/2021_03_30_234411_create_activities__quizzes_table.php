<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities__quizzes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prueba_id');
            $table->foreign('prueba_id')
                ->references('id')
                ->on('quizzes');
            $table->unsignedBigInteger('actividad');
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
        Schema::dropIfExists('activities__quizzes');
    }
}
