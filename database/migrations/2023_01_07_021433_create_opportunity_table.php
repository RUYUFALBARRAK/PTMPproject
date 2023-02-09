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
       Schema::create('opportunity', function (Blueprint $table) {
            $table->increments('id');
            $table->date('Start_at');
            $table->date('end_at');
            $table->string('jobTitle');
            $table->integer('workHours');
            $table->string('supervisorName');
            $table->string('supervisorPhone');
            $table->string('RoleDescription');
            $table->string('incentive');
            $table->string('requirement');
            $table->string('majors');
            $table->integer('numberOfTrainee');
            $table->integer('numberOfTraineeAssigned')->default('0');
            $table->string('address');
            $table->date('AppDeadline');
            $table->string('PtPlan');
            $table->enum('status', ['accept', 'reject', 'pending' , 'need_modification'])->default('pending');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('opportunity');
    }
};
