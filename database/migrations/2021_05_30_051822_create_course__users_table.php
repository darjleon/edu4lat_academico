<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course__users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')
                ->references('id')
                ->on('courses')->onDelete('cascade');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')
                ->references('id')
                ->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('course__users');
    }
}
