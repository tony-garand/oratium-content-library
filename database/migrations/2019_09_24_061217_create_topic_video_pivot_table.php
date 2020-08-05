<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicVideoPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics_videos', function (Blueprint $table) {
            $table->integer('topics_id')->unsigned()->index();
            $table->foreign('topics_id')->references('id')->on('topics')->onDelete('cascade');
            $table->integer('videos_id')->unsigned()->index();
            $table->foreign('videos_id')->references('id')->on('videos')->onDelete('cascade');
            $table->primary(['topics_id', 'videos_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('topics_videos');
    }
}
