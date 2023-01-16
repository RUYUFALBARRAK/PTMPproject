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
        Schema::create('document', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unit_id')->nullable();
            $table->foreign('unit_id')->references('unit_id')->on('unit')->onDelete('cascade');
            $table->string('documentName');
            $table->string('document')->unique();
            $table->string('size')->nullable()->default(null);
            $table->string('uploaded_for')->default('both');
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
        Schema::dropIfExists('document');
    }
};


