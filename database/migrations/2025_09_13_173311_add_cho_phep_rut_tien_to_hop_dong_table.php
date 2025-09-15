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
            $table->tinyInteger('cho_phep_rut_tien')->default(0)->after('cong_ty_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hop_dong', function (Blueprint $table) {
            $table->dropColumn('cho_phep_rut_tien');
        });
    }
};
