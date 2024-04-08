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
        Schema::table('profile_progressions', function (Blueprint $table) {
            $table->dropColumn('cur_fnshd_tsts');
            $table->integer('fnshd_tsts_hir')->default(0);
            $table->integer('fnshd_tsts_kat')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('profile_progressions', function (Blueprint $table) {
            $table->integer('cur_fnshd_tsts')->default(0);
            $table->dropColumn(['fnshd_tsts_hir', 'fnshd_tsts_kat']);
        });
    }
};
