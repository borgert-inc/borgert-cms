<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products_contents', function (Blueprint $table) {
            $table->string('information_technical')->nullable()->after('content');
            $table->decimal('price', 15, 2)->nullable()->after('information_technical');
            $table->decimal('price_per', 15, 2)->nullable()->after('price');
            $table->string('code')->nullable()->after('price_per');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products_contents', function (Blueprint $table) {
            $table->dropColumn('information_technical');
            $table->dropColumn('price');
            $table->dropColumn('price_per');
            $table->dropColumn('code');
        });
    }
}
