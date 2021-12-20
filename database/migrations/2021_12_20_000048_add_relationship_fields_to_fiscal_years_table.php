<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFiscalYearsTable extends Migration
{
    public function up()
    {
        Schema::table('fiscal_years', function (Blueprint $table) {
            $table->unsignedBigInteger('br_id')->nullable();
            $table->foreign('br_id', 'br_fk_5431400')->references('id')->on('branches');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5431401')->references('id')->on('users');
        });
    }
}
