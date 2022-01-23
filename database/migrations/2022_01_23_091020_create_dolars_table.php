<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDolarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dolars', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 15, 2)->nullable();
            $table->string('details')->nullable();
            $table->unsignedBigInteger('donor_amount_id')->nullable();
            $table->foreign('donor_amount_id', 'donor_amount_fk_56729')->references('id')->on('donor_amount');
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->decimal('unit_amount', 15,2)->nullable();
            $table->foreign('bank_id', 'bank_don_fk_5489974')->references('id')->on('banks');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_id_8996574')->references('id')->on('users');
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
        Schema::dropIfExists('dolars');
    }
}
