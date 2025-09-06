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
        Schema::table('hop_dong', function (Blueprint $table) {
            $table->enum('loai_hop_dong', ['cho_ban_than', 'cho_nguoi_khac'])->default('cho_ban_than')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hop_dong', function (Blueprint $table) {
            $table->dropColumn('loai_hop_dong');
        });
    }
};
