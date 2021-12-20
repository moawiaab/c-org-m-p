<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSheksTable extends Migration
{
    public function up()
    {
        Schema::create('sheks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->string('shek_number')->nullable();
            $table->date('entry_date')->nullable();
            $table->string('amount_text')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
