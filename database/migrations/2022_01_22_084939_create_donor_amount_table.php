<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorAmountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donor_amount', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 15, 2)->nullable();
            $table->string('details')->nullable();
            $table->decimal('teg_amount', 15,2)->nullable();
            $table->unsignedBigInteger('donor_id')->nullable();
            $table->foreign('donor_id', 'donor_fk_56729')->references('id')->on('donors');
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->foreign('bank_id', 'bank_do_fk_5489974')->references('id')->on('banks');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_id_89974')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donor_amount');
    }
}
