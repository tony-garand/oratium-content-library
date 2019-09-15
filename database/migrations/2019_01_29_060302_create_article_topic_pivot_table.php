<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTopicPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_topics', function (Blueprint $table) {
            $table->integer('articles_id')->unsigned()->index();
            $table->foreign('articles_id')->references('id')->on('articles')->onDelete('cascade');
            $table->integer('topics_id')->unsigned()->index();
            $table->foreign('topics_id')->references('id')->on('topics')->onDelete('cascade');
            $table->primary(['articles_id', 'topics_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles_topics');
    }
}
