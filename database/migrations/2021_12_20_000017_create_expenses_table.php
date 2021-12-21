<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('amount', 15, 2)->nullable();
            $table->string('text_amount');
            $table->string('beneficiary');
            $table->longText('details');
            $table->longText('feeding')->nullable();
            $table->tinyText('stage')->default('new');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
