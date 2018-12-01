<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentNotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comment');
            $table->integer('user_id')->unsigned();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('commentable_id')->unsigned();
            $table->string('commentable_type');
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
        Schema::dropIfExists('comment_notes');
    }
}
