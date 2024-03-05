<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('subject_id');
            $table->integer('class_id');
            $table->integer('user_id');
            $table->string('name');
            $table->text('note');
            $table->string('duration');
            $table->string('category')->default(1);
            $table->string('status')->default(2);
            $table->string('redo');
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
        Schema::drop('tests');
    }
}
