<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nameSurname');
            $table->string('studentNumber');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phoneNumber');
            $table->string('identyNumber');
            $table->text('address');
            $table->string('class');
            $table->date('birthday');
            $table->string('university');
            $table->string('faculty');
            $table->string('section');
            $table->string('photo');
            $table->string('resetCode');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
