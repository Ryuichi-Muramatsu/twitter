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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('ユーザID');
            $table->unsignedBigInteger('tweet_id')->comment('ツイートID');
            $table->string('text')->comment('本文');
            $table->softDeletes();
            $table->timestamps();

            $table->index('id');
            $table->index('user_id');
            $table->index('tweet_id');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->foreign('tweet_id')
            ->references('id')
            ->on('tweets')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
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
    }
};
