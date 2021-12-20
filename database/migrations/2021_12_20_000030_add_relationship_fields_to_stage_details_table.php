<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStageDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('stage_details', function (Blueprint $table) {
            $table->unsignedBigInteger('stage_id')->nullable();
            $table->foreign('stage_id', 'stage_fk_5616973')->references('id')->on('project_stages');
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_5616977')->references('id')->on('projects');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5616978')->references('id')->on('users');
        });
    }
}
