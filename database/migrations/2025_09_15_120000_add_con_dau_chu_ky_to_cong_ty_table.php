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
        Schema::table('cong_ty', function (Blueprint $table) {
            $table->longText('con_dau')->nullable();
            $table->longText('chu_ky')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cong_ty', function (Blueprint $table) {
            $table->dropColumn(['con_dau', 'chu_ky']);
        });
    }
};


