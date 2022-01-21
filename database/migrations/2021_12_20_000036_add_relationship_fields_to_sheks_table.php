<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSheksTable extends Migration
{
    public function up()
    {
        Schema::table('sheks', function (Blueprint $table) {
            $table->unsignedBigInteger('expense_id')->nullable();
            $table->foreign('expense_id', 'expense_fk_5617205')->references('id')->on('expenses');
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_5617206')->references('id')->on('Ratifications');
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->foreign('bank_id', 'bank_fk_5617209')->references('id')->on('banks');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5617210')->references('id')->on('users');
            $table->unsignedBigInteger('br_id')->nullable();
            $table->foreign('br_id', 'br_fk_5617211')->references('id')->on('branches');
        });
    }
}
