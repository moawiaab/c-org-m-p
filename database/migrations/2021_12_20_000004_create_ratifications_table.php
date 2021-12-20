<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatificationsTable extends Migration
{
    public function up()
    {
        Schema::create('ratifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('amount', 15, 2);
            $table->string('amount_text');
            $table->string('beneficiary');
            $table->longText('details');
            $table->integer('stage')->nullable();
            $table->longText('feedback')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
