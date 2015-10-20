<?php

use Illuminate\Database\Migrations\Migration;

class AddIsLoginLinkColumnToMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menus', function ($table) {
            $table->boolean('is_login_link')->default(false)->after('is_search_form');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menus', function ($table) {
            $table->dropColumn('is_login_link');
        });
    }
}
