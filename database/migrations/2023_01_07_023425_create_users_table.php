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
            $table->string('name',50);
            $table->integer('CompletedHours',5);
            $table->string('GPA',5);
            $table->string('email')->unique();
            $table->string('major',20);
            $table->string('phone',10);
            $table->string('role')->default('1');
            $table->boolean('is_request');
            $table->string('password');
            $table->string('unit_id')->nullable();
            $table->foreign('unit_id')->references('unit_id')->on('unit')->onDelete('cascade');
            $table->string('committee_id')->nullable();
            $table->foreign('committee_id')->references('committee_id')->on('committee')->onDelete('cascade');
            $table->enum('status', ['Available', 'Completed', 'Ongoing'])->default('Available');
            $table->enum('statusFormCompany', ['accept', 'reject', 'Pending'])->default('Pending');
            $table->unsignedInteger('opportunity_id')->nullable();
            $table->foreign('opportunity_id')->references('id')->on('opportunity')->onDelete('cascade');
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
