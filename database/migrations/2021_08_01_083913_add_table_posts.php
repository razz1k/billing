<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTablePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('metaTitle')->nullable();
            $table->text('metaDescription')->nullable();
            $table->text('metaKeywords')->nullable();
            $table->text('preview')->nullable();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->text('videoYoutube')->nullable();
            $table->text('after')->nullable();
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('posts');
    }
}
