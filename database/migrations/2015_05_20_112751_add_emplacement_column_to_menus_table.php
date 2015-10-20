<?php

use Illuminate\Database\Migrations\Migration;

class AddEmplacementColumnToMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menus', function ($table) {
            $table->string('emplacement')->after('weight');
            $table->boolean('is_category_dropdown')->default(false)->after('is_search_form');
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
            $table->dropColumn('emplacement');
            $table->dropColumn('is_category_dropdown');
        });
    }
}
