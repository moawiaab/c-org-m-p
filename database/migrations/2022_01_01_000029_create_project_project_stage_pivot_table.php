<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectProjectStagePivotTable extends Migration
{
    public function up()
    {
        Schema::create('project_project_stage', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->decimal('amount')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->string('feeding')->nullable();
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id', 'project_id_fk_5714484')->references('id')->on('projects')->onDelete('cascade');
            $table->unsignedBigInteger('project_stage_id');
            $table->foreign('project_stage_id', 'project_stage_id_fk_5714484')->references('id')->on('project_stages')->onDelete('cascade');
            $table->timestamps();
        });
    }
}
