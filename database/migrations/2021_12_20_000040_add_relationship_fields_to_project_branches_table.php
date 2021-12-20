<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProjectBranchesTable extends Migration
{
    public function up()
    {
        Schema::table('project_branches', function (Blueprint $table) {
            $table->unsignedBigInteger('proj_id')->nullable();
            $table->foreign('proj_id', 'proj_fk_5616811')->references('id')->on('project_departments');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5616812')->references('id')->on('users');
            $table->unsignedBigInteger('br_id')->nullable();
            $table->foreign('br_id', 'br_fk_5616813')->references('id')->on('branches');
        });
    }
}
