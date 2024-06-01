<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsOfUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->string("author_post", 255)->nullable();
            $table->string("image_post")->nullable();
            $table->text("description");

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
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign("posts_user_id_foreign");
            $table->dropColumn("user_id");
            $table->dropColumn("author_post");
            $table->dropColumn("image_post");
            $table->dropColumn("description");
        });
        Schema::dropIfExists('posts');
    }
}
