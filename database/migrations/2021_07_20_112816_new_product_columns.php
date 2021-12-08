<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewProductColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumns('products', ['menu_id', 'active'])) {
            Schema::table('products', function (Blueprint $table) {
                $table->foreignId('menu_id');
                $table->boolean('active');

                $table->foreign('menu_id')->references('id')->on('menus');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
