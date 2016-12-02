<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoProfesorPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_profesor', function (Blueprint $table) {
            $table->integer('curso_id')->unsigned()->index();
            $table->foreign('curso_id')->references('id')->on('curso')->onDelete('cascade');
            $table->integer('profesor_id')->unsigned()->index();
            $table->foreign('profesor_id')->references('id')->on('profesor')->onDelete('cascade');
            $table->primary(['curso_id', 'profesor_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('curso_profesor');
    }
}
