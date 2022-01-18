<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_details', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id')->uniqid();
            $table->foreign('project_id', 'project_id_fk_54134')->references('id')->on('projects');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_f_611134')->references('id')->on('users');
            $table->string('details', 30)->nullable();
            $table->string('place', 100)->nullable();
            $table->string('longitude', 30)->nullable();
            $table->string('latitude', 30)->nullable();
            $table->string('beneficiary_category', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_details');
    }
}
