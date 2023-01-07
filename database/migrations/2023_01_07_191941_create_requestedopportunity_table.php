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
        Schema::create('requestedopportunity', function (Blueprint $table) {
            $table->id();
             $table->string('statusbycommittee');
            $table->string('statusbytrainee');
            $table->string('trainee_id')->nullable();
            $table->foreign('trainee_id')->references('trainee_id')->on('users')->onDelete('cascade');
            $table->string('committee_id')->nullable();
            $table->foreign('committee_id')->references('committee_id')->on('committee')->onDelete('cascade');
            $table->unsignedInteger('opportunity_id')->nullable();
            $table->foreign('opportunity_id')->references('id')->on('opportunity')->onDelete('cascade');
            $table->unsignedInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');
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
        Schema::dropIfExists('requestedopportunity');
    }
};
