<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYazApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yaz_application', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('studentId');
            $table->string('teacher');
            $table->string('university');
            $table->string('kou_1');
            $table->string('kou_2')->nullable();
            $table->string('kou_3')->nullable();
            $table->string('university_1');
            $table->string('university_2')->nullable();
            $table->string('university_3')->nullable();
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
        Schema::dropIfExists('yaz_application');
    }
}
