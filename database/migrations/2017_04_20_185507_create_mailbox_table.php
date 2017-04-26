<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailboxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailbox', function (Blueprint $table) {
            $table->increments('id');
            $table->string('locale', 40)->default('CONTATO');
            $table->string('name', 130);
            $table->string('email', 120);
            $table->string('subject', 70);
            $table->text('description');
            $table->string('map', 40)->default('INBOX');
            $table->boolean('open')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mailbox');
    }
}
