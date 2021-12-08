<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsCompanyId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('products', 'company_id')) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
//        if (Schema::hasColumn('products', 'company_id')) {
//            Schema::table('products', function (Blueprint $table) {
//                $table->dropForeign('company_id');
//                $table->dropColumn('company_id');
//            });
//        }
    }
}
