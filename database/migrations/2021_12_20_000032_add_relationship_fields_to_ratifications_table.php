<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRatificationsTable extends Migration
{
    public function up()
    {
        Schema::table('ratifications', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_5617155')->references('id')->on('projects');
            $table->unsignedBigInteger('project_stage_id')->nullable();
            $table->foreign('project_stage_id', 'project_stage_fk_5617156')->references('id')->on('project_stages');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5617162')->references('id')->on('users');
            $table->unsignedBigInteger('br_id')->nullable();
            $table->foreign('br_id', 'br_fk_5617163')->references('id')->on('branches');
            $table->unsignedBigInteger('project_manager_id')->nullable();
            $table->foreign('project_manager_id', 'project_manager_fk_5617164')->references('id')->on('users');
            $table->unsignedBigInteger('executive_id')->nullable();
            $table->foreign('executive_id', 'executive_fk_5617165')->references('id')->on('users');
            $table->unsignedBigInteger('financial_id')->nullable();
            $table->foreign('financial_id', 'financial_fk_5617166')->references('id')->on('users');
            $table->unsignedBigInteger('accountant_id')->nullable();
            $table->foreign('accountant_id', 'accountant_fk_5617167')->references('id')->on('users');
        });
    }
}
