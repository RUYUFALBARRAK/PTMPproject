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
            $table->date('created_at');
            $table->string('job_title');
            $table->string('work_h');
            $table->string('S_name');
            $table->string('E_phone');
            $table->string('Role_des');
            $table->string('job_title');
            $table->boolean('incentive')->default(1);
            $table->string('requirement');
            $table->string('majors');
            $table->integer('number_of_trainee');
            $table->string('address');
            $table->date('App_deadline');
            $table->date('PTplan');
            $table->enum('status', ['accept', 'reject', 'Pending'])->default('Pending');
            $table->unsignedInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');
            $table->string('trainee_id');
            $table->foreign('trainee_id')->references('trainee_id')->on('users')->onDelete('cascade');
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
