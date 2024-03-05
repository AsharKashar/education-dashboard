<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        // class table
        Schema::create('classes', function(Blueprint $table)
        {
            $table->increments('id');
            $table -> integer('teacher_id') -> unsigned();
            $table -> integer('student_id') -> unsigned();
            $table -> integer('subject_id') -> unsigned();
            $table -> integer('section_id') -> unsigned();
            $table -> integer('school_id') -> unsigned() -> default(1);
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->boolean('active');
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
        
        Schema::drop('classes');
    }

}
