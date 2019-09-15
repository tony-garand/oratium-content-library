<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiftTopicPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lifts_topics', function (Blueprint $table) {
            $table->integer('lifts_id')->unsigned()->index();
            $table->foreign('lifts_id')->references('id')->on('lifts')->onDelete('cascade');
            $table->integer('topics_id')->unsigned()->index();
            $table->foreign('topics_id')->references('id')->on('topics')->onDelete('cascade');
            $table->primary(['lifts_id', 'topics_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lift_topic');
    }
}
