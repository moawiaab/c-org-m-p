<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('details')->nullable();
            $table->string('number')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->decimal('amount_in', 15, 2)->nullable();
            $table->decimal('dolar', 15, 2)->nullable();
            $table->decimal('amount_out', 15, 2)->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
