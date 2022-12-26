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
        Schema::create('committee', function (Blueprint $table) {
            $table->string('name',20);
            $table->string('committee_id',9)->primary();
            $table->string('email')->unique();
            $table->string('Major',20);
            $table->string('password');
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
       // $table->dropForeign('committee_user_trainee_id_foreign');
       // $table->dropIndex('committee_user_trainee_id_index');
       // $table->dropColumn('trainee_id');
        Schema::dropIfExists('committee');
    }
};
