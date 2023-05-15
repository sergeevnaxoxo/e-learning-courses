<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->decimal('points', $precision = 19, $scale = 1)->nullable();
            $table->unsignedBigInteger('user_id')->nullable()->onDelete('cascade')->onUpdate('cascde');
            $table->unsignedBigInteger('slider_id')->nullable()->onDelete('cascade')->onUpdate('cascde');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('slider_id')->references('id')->on('sliders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visits');
    }
}
