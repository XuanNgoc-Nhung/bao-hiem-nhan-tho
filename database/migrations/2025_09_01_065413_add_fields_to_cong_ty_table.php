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
            $table->string('email')->nullable();
            $table->string('so_dien_thoai')->nullable();
            $table->string('dia_chi')->nullable();
            $table->string('loai_hinh')->nullable();
            $table->string('ngay_dang_ky')->nullable();
            $table->string('ma_so_thue')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cong_ty', function (Blueprint $table) {
            $table->dropColumn([
                'email',
                'so_dien_thoai',
                'dia_chi',
                'loai_hinh',
                'ngay_dang_ky',
                'ma_so_thue'
            ]);
        });
    }
};
