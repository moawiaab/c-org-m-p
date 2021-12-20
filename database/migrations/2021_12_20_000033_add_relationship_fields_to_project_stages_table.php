<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProjectStagesTable extends Migration
{
    public function up()
    {
        Schema::table('project_stages', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_5616959')->references('id')->on('projects');
            $table->unsignedBigInteger('br_id')->nullable();
            $table->foreign('br_id', 'br_fk_5616961')->references('id')->on('branches');
            $table->unsignedBigInteger('user_created_id')->nullable();
            $table->foreign('user_created_id', 'user_created_fk_5616962')->references('id')->on('users');
        });
    }
}
