<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedDecimal('maxpoint', $precision = 19, $scale = 1)->nullable();
            $table->unsignedBigInteger('tutor_id')->nullable()->onDelete('cascade')->onUpdate('cascde');
            $table->unsignedBigInteger('status_id')->nullable()->onDelete('cascade')->onUpdate('cascde');
            $table->foreign('tutor_id')->references('id')->on('users');
            $table->foreign('status_id')->references('id')->on('statuses');
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
        Schema::dropIfExists('courses');
    }
}
