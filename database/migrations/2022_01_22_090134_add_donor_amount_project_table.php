<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDonorAmountProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donor_amount_project', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id', 'project_id_fk_57484')->references('id')->on('projects')->onDelete('cascade');
            $table->unsignedBigInteger('donor_amount_id');
            $table->foreign('donor_amount_id', 'donor_amount_id_fk_5714484')->references('id')->on('donor_amount')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
