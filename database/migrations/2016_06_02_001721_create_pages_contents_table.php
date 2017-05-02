<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 170);
            $table->text('description');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('pages_categorys');
            $table->integer('order')->default(0);
            $table->integer('status')->default(1);
            $table->string('slug')->default('');
            $table->string('seo_title', 70);
            $table->string('seo_description', 170);
            $table->string('seo_keywords')->nullable();
            $table->softDeletes();
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
        Schema::drop('pages_contents');
    }
}
