<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrabchProjectPivotTable extends Migration
{
    public function up()
    {
        Schema::create('branch_project', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id', 'project_id_fk_5714485')->references('id')->on('projects')->onDelete('cascade');
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id', 'branch_id_fk_5714485')->references('id')->on('branches')->onDelete('cascade');
        });
    }
}
