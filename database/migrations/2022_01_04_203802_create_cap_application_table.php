<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cap_application', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('studentId');
            $table->string('studiedPeriod');
            $table->string('gpa');
            $table->string('classSuccessPercentage');
            $table->string('semester');
            $table->string('option1');
            $table->string('option2')->nullable();
            $table->string('option3')->nullable();
            $table->boolean('isDraft')->default(1);
            $table->boolean('isConfirmed')->default(0);
            $table->string('file')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cap_application');
    }
}
