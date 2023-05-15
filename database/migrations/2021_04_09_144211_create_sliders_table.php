<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->longText('descrition')->nullable();
            $table->decimal('maxpoints', $precision = 19, $scale = 1)->nullable();
            $table->decimal('minpoints', $precision = 19, $scale = 1)->nullable();
            $table->unsignedBigInteger('course_id')->nullable()->onDelete('cascade')->onUpdate('cascde');
            $table->unsignedBigInteger('task_id')->nullable()->onDelete('cascade')->onUpdate('cascde');
            $table->unsignedBigInteger('training_id')->nullable()->onDelete('cascade')->onUpdate('cascde');
            $table->timestamps();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('training_id')->references('id')->on('trainings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
