<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectStageUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('project_stage_user', function (Blueprint $table) {
            $table->unsignedBigInteger('project_stage_id');
            $table->foreign('project_stage_id', 'project_stage_id_fk_5616960')->references('id')->on('project_stages')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_5616960')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
