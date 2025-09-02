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
        Schema::table('can_cuoc_cong_dan', function (Blueprint $table) {
            $table->string('ma_bao_mat')->nullable()->after('ccccd');
            $table->unique('ccccd');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('can_cuoc_cong_dan', function (Blueprint $table) {
            $table->dropColumn('ma_bao_mat');
            $table->dropUnique(['ccccd']);
        });
    }
};


