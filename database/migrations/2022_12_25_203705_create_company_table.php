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
            $table->string('orgnizationName',50);
            $table->string('website');
            $table->string('SupervisorName',50);
            $table->string('Registration',50);
            $table->string('description');
            $table->string('orgnizationEmail')->unique();
            $table->string('logoImage');
            $table->string('role')->default('4');
            $table->string('OrganizationPhone',13);
            $table->string('SupervisorEmail',50);
            $table->string('SupervisorPhone',13);
            $table->string('country',30);
            $table->string('Address',50);
            $table->string('SupervisorFax',13);
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
