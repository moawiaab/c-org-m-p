<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBudgetsTable extends Migration
{
    public function up()
    {
        Schema::table('budgets', function (Blueprint $table) {
            $table->unsignedBigInteger('budget_id');
            $table->foreign('budget_id', 'budget_fk_5431533')->references('id')->on('budget_names');
            $table->unsignedBigInteger('br_id')->nullable();
            $table->foreign('br_id', 'br_fk_5431534')->references('id')->on('branches');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5431535')->references('id')->on('users');
            $table->unsignedBigInteger('fiscal_year_id')->nullable();
            $table->foreign('fiscal_year_id', 'fiscal_year_fk_5431536')->references('id')->on('fiscal_years');
        });
    }
}
