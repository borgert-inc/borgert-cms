<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',170);
            $table->text('content');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('products_categorys');
            $table->integer('status')->default(1);
            $table->string('seo_title',70);
            $table->string('seo_description',170);
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
        Schema::drop('products_contents');
    }
}
