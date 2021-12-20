<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStageDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('stage_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('details')->nullable();
            $table->longText('feedback')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
