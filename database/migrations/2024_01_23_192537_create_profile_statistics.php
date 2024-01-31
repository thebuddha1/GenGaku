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
        Schema::create('profile_statistics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->integer('experience')->default(0);
            $table->integer('streak')->default(0);
            $table->date('last_login')->default(now());
            $table->boolean('logged_in_today')->default(true);
            $table->integer('highest_rank')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profile_statistics', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        });
        
        Schema::dropIfExists('profile_statistics');
    }
};
