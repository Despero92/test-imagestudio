<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('content', function (Blueprint $table) {
            $table->integer('order')->nullable()->after('field_name');
            $table->string('section')->nullable()->after('order');
            $table->string('title')->nullable()->after('section');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('content', function($table)
        {
            $table->dropColumn('order');
            $table->dropColumn('section');
            $table->dropColumn('title');
        });
    }
}
