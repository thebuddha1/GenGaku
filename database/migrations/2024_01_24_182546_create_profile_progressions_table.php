<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profile_progressions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->integer('cur_chpt')->default(0);
            $table->integer('cur_lsn')->default(0);
            $table->integer('fnshd_tsts')->default(0);
            $table->integer('cur_hrgn')->default(0);
            $table->integer('cur_ktkn')->default(0);
            $table->integer('cur_fnshd_tsts')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profile_progressions', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('profile_progressions');
    }
};
