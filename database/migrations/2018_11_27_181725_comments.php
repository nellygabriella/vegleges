<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comment');
            $table->integer('votes')->default(0);
            $table->integer('reply_id')->default(0);
            $table->integer('question_id')->unsigned();
            $table->integer('users_id');
            $table->timestamps();
        });

        Schema::create('comment_user_vote', function (Blueprint $table) {
            $table->integer('comment_id');
            $table->integer('user_id');
            $table->string('vote',11);
        });

        Schema::create('comment_spam', function (Blueprint $table) {
            $table->integer('comment_id');
            $table->integer('user_id');
        });

        Schema::table('comments', function ($table){
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
        Schema::dropForeign(['post_id']);
    }
}
