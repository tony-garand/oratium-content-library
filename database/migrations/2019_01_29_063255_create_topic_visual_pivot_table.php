<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicVisualPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics_visuals', function (Blueprint $table) {
            $table->integer('topics_id')->unsigned()->index();
            $table->foreign('topics_id')->references('id')->on('topics')->onDelete('cascade');
            $table->integer('visuals_id')->unsigned()->index();
            $table->foreign('visuals_id')->references('id')->on('visuals')->onDelete('cascade');
            $table->primary(['topics_id', 'visuals_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('topics_visuals');
    }
}
