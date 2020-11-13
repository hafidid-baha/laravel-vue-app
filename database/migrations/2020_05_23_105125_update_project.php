<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('enddate');
            $table->longText('framworks');
            $table->longText('tasks');
            $table->longText('tech');
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('projects', function (Blueprint $table) {
            $table->timestamp('enddate')->nullable();
            $table->dropColumn('framworks');
            $table->dropColumn('tasks');
            $table->dropColumn('tech');
            $table->dropColumn('status');
        });
    }
}
