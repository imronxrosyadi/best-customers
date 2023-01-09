<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_point_evaluations', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('customer_evaluation_id')->unsigned();
            // $table->bigInteger('criteria_id')->unsigned();
            // $table->bigInteger('sub_criteria_id')->unsigned();
            // $table->foreign('customer_evaluation_id')->references('id')->on('customers_evaluations')->onDelete('cascade');
            $table->foreignId('customer_evaluation_id')->constrained('customers_evaluations')->onDelete('cascade');
            // $table->foreign('criteria_id')->references('id')->on('criterias')->onDelete('cascade');
            // $table->foreign('sub_criteria_id')->references('id')->on('sub_criterias')->onDelete('cascade');
            $table->foreignId('sub_criteria_id')->constrained('sub_criterias')->onDelete('cascade');
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
        Schema::dropIfExists('customer_point_evaluations');
    }
};
