<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRightQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('right_questions', function (Blueprint $table) {
            $table->id();
            $table->decimal('points', $precision = 19, $scale = 1)->nullable();
            $table->unsignedBigInteger('question_id')->nullable()->onDelete('cascade')->onUpdate('cascde');
            $table->unsignedBigInteger('variant_id')->nullable()->onDelete('cascade')->onUpdate('cascde');
            $table->timestamps();
            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('variant_id')->references('id')->on('variants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('right_questions');
    }
}
