<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('profile_statistics', function (Blueprint $table) {
            $table->dropColumn('highest_rank');
            $table->integer('finished_tests')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('profile_statistics', function (Blueprint $table) {
            $table->integer('highest_rank')->default(1);
            $table->dropColumn('finished_tests');
        });
    }
};
