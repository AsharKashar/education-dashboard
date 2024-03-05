<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_questions', function(Blueprint $table)
        {
            $table->increments('id');
        //    $table->integer('test_id');
        //    $table->string('question');
        //    $table->string('option_a');
        //    $table->string('option_b');
        //    $table->string('option_c');
        //    $table->string('option_d');
        //    $table->string('correct_answer');
            $table->integer('test_id');
            $table->string('type');
            $table->string('file');
            $table->string('options');
            $table->string('question');
            $table->string('point');
            $table->string('order');
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
        Schema::drop('test_questions');
    }
}
