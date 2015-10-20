<?php

use Illuminate\Database\Migrations\Migration;

class RenameUriColumnFromMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menus', function ($table) {
            $table->renameColumn('uri', 'url');
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
            $table->renameColumn('url', 'uri');
        });
    }
}
