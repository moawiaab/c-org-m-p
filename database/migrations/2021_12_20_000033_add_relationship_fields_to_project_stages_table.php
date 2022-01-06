<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProjectStagesTable extends Migration
{
    public function up()
    {
        Schema::table('project_stages', function (Blueprint $table) {
            $table->unsignedBigInteger('br_id')->nullable();
            $table->foreign('br_id', 'br_fk_5616961')->references('id')->on('branches');
        });
    }
}
