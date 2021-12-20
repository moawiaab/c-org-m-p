<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToExpensesTable extends Migration
{
    public function up()
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->unsignedBigInteger('bud_name_id')->nullable();
            $table->foreign('bud_name_id', 'bud_name_fk_5616640')->references('id')->on('budget_names');
            $table->unsignedBigInteger('budget_id')->nullable();
            $table->foreign('budget_id', 'budget_fk_5616641')->references('id')->on('budgets');
            $table->unsignedBigInteger('br_id')->nullable();
            $table->foreign('br_id', 'br_fk_5616642')->references('id')->on('branches');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5616643')->references('id')->on('users');
            $table->unsignedBigInteger('administrative_id')->nullable();
            $table->foreign('administrative_id', 'administrative_fk_5616650')->references('id')->on('users');
            $table->unsignedBigInteger('executive_id')->nullable();
            $table->foreign('executive_id', 'executive_fk_5616651')->references('id')->on('users');
            $table->unsignedBigInteger('financial_id')->nullable();
            $table->foreign('financial_id', 'financial_fk_5616652')->references('id')->on('users');
            $table->unsignedBigInteger('accountant_id')->nullable();
            $table->foreign('accountant_id', 'accountant_fk_5616653')->references('id')->on('users');
        });
    }
}
