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
            Schema::create('_review', function (Blueprint $table) {
            $table->increments('id');
            $table->string('review');
            $table->integer('star_rating');
            $table->string('trainee_id');
            $table->foreign('trainee_id')->references('trainee_id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('company_id')->nullable();
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_review');
    }
};
