<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('websits');
            $table->string('Ename',20);
            $table->string('Reg_number',50);
            $table->string('about');
            $table->string('email')->unique();
            $table->string('logo_img');
            $table->string('S_name',50);
            $table->string('off_phone',10);
            $table->string('S_email',50);
            $table->string('S_phone',10);
            $table->string('city',30);
            $table->string('address',50);
            $table->string('fax',10);
            $table->string('password');
            $table->enum('status', ['accept', 'reject', 'Pending'])->default('Pending');
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
        Schema::dropIfExists('company');
    }
};
