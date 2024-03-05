<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_results', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('test_id');
            $table->string('score');
            $table->integer('counter');
            $table->integer('status')->default(0);
            $table->integer('total');
            $table->string('time');
            $table->longText('answer');
            $table->longText('questions');
            $table->longText('mark_point');
            $table->longText('mark_action');
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
        Schema::drop('test_results');
    }
}
