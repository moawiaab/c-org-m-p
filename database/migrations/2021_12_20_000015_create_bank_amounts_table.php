<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAmountsTable extends Migration
{
    public function up()
    {
        Schema::create('bank_amounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('amount_in', 15, 2)->nullable();
            $table->decimal('amount_out', 15, 2)->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->longText('details')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
