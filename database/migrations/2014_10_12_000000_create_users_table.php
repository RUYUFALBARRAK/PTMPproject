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
        Schema::create('users', function (Blueprint $table) {
            $table->string('trainee_id')->primary();
            $table->string('name',20);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('Major',20);
            $table->string('phone',10);
            $table->boolean('is_request')->default(1);
            $table->enum('role', ['1', '2', '3','4'])->default('1');
            $table->enum('status', ['Available', 'Completed', 'Ongoing'])->default('Available');
            $table->string('password');
            $table->rememberToken();// for remembr me in the websits
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
};
