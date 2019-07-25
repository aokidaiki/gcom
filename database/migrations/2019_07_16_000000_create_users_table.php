<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('comment')->nullable();
            $table->text('gamelist')->nullable();
            $table->unsignedBigInteger('games_id')->nullable();
            $table->string('icon_image')->nullable();
            $table->string('background_image')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('board_name')->nullable();
            $table->string('board_comment')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('games_id')
            ->references('id')
            ->on('games')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('icon_image'); 
        });
    }
}
