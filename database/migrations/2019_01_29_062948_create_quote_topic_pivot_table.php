<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoteTopicPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes_topics', function (Blueprint $table) {
            $table->integer('quotes_id')->unsigned()->index();
            $table->foreign('quotes_id')->references('id')->on('quotes')->onDelete('cascade');
            $table->integer('topics_id')->unsigned()->index();
            $table->foreign('topics_id')->references('id')->on('topics')->onDelete('cascade');
            $table->primary(['quotes_id', 'topics_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quotes_topics');
    }
}
