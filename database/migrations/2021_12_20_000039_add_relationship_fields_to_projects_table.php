<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('project_department_id')->nullable();
            $table->foreign('project_department_id', 'project_department_fk_5616928')->references('id')->on('project_departments');
            $table->unsignedBigInteger('project_branch_id')->nullable();
            $table->foreign('project_branch_id', 'project_branch_fk_5616929')->references('id')->on('project_branches');
            $table->unsignedBigInteger('donor_id')->nullable();
            $table->foreign('donor_id', 'donor_fk_5616930')->references('id')->on('donors');
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id', 'branch_fk_5616932')->references('id')->on('branches');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id', 'country_fk_5616933')->references('id')->on('countries');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id', 'city_fk_5616934')->references('id')->on('ctiys');
            $table->unsignedBigInteger('area_id')->nullable();
            $table->foreign('area_id', 'area_fk_5616935')->references('id')->on('areas');

        });
    }
}
