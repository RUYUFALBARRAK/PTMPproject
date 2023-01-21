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
        Schema::create('traineeRequest', function (Blueprint $table) {
            $table->string('trainee_id');
            $table->foreign('trainee_id')->references('trainee_id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('opportunity_id');
            $table->foreign('opportunity_id')->references('id')->on('opportunity')->onDelete('cascade');
            $table->enum('statusFormCompany', ['accept', 'reject', 'Pending'])->default('Pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainee_request');
    }
};
