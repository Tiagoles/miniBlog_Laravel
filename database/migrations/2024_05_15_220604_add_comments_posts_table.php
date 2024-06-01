<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommentsPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_posts', function (Blueprint $table) {
            $table->id("id_comment");
            $table->text("comments");
            $table->unsignedBigInteger("user_id");
            $table->string("name");
            $table->unsignedBigInteger("post_id");
            $table->foreign("post_id")->references("id")->on("posts");
            $table->foreign("user_id")->references("id")->on("users");
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
        Schema::table("comments_posts", function (Blueprint $table) {
            $table->dropForeign("comments_posts_user_id_foreign");
            $table->dropColumn("comments_posts_user_id_foreign");
            $table->dropForeign("post_id");
            $table->dropColumn("post_id");
            Schema::dropIfExists('comments_posts');
        });
        
    }
}
