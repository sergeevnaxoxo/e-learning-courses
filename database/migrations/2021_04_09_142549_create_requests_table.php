<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->nullable();
            $table->date('date')->nullable();
            $table->unsignedBigInteger('course_id')->nullable()->onDelete('cascade')->onUpdate('cascde');
            $table->unsignedBigInteger('student_id')->nullable()->onDelete('cascade')->onUpdate('cascde');
            $table->timestamps();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('student_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
