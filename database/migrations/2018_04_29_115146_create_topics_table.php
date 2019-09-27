<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100); // 主题的姓名
            $table->integer('created_at')->nullable();
            $table->integer('updated_at')->nullable();
        });

        Schema::create('post_topics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id'); // 主题的文章的id
            $table->integer('topic_id'); // 主题的id
            $table->integer('created_at')->nullable();
            $table->integer('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topics');
        Schema::dropIfExists('post_topics');
    }
}
