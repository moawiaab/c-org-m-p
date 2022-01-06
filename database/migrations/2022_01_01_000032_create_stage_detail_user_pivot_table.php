<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStageDetailUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('stage_detail_user', function (Blueprint $table) {
            $table->unsignedBigInteger('stage_detail_id');
            $table->foreign('stage_detail_id', 'stage_detail_id_fk_5714486')->references('id')->on('stage_details')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_5714486')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
