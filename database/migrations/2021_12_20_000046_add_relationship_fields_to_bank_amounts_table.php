<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBankAmountsTable extends Migration
{
    public function up()
    {
        Schema::table('bank_amounts', function (Blueprint $table) {
            $table->unsignedBigInteger('bank_from_id')->nullable();
            $table->foreign('bank_from_id', 'bank_from_fk_5489973')->references('id')->on('banks');
            $table->unsignedBigInteger('bank_to_id')->nullable();
            $table->foreign('bank_to_id', 'bank_to_fk_5489974')->references('id')->on('banks');
            $table->unsignedBigInteger('br_id')->nullable();
            $table->foreign('br_id', 'br_fk_5489979')->references('id')->on('branches');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5489980')->references('id')->on('users');
        });
    }
}
