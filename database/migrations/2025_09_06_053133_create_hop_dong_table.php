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
        Schema::create('hop_dong', function (Blueprint $table) {
            $table->id();
            $table->string('cccd')->nullable();
            $table->string('ma_hop_dong')->nullable();
            $table->string('ho_ten')->nullable();
            $table->string('gioi_tinh')->nullable();
            $table->string('ngay_sinh')->nullable();
            $table->string('dia_chi')->nullable();
            $table->string('so_dien_thoai')->nullable();
            $table->string('so_tien_mua')->nullable();
            $table->string('so_tien_dong_hang_nam')->nullable();
            $table->string('thoi_gian_mua')->nullable();
            $table->string('ngay_cap_hop_dong')->nullable();
            $table->string('ngay_dao_han')->nullable();
            $table->string('ngan_hang')->nullable();
            $table->string('so_tai_khoan')->nullable();
            $table->string('chu_tai_khoan')->nullable();
            $table->string('anh_mat_truoc')->nullable();
            $table->string('anh_mat_sau')->nullable();
            $table->string('anh_chan_dung')->nullable();
            $table->string('th_cccd')->nullable();
            $table->string('th_moi_quan_he')->nullable();
            $table->string('th_ho_ten')->nullable();
            $table->string('th_gioi_tinh')->nullable();
            $table->string('th_ngay_sinh')->nullable();
            $table->string('th_dia_chi')->nullable();
            $table->string('th_so_dien_thoai')->nullable();
            $table->string('th_ngan_hang')->nullable();
            $table->string('th_so_tai_khoan')->nullable();
            $table->string('th_chu_tai_khoan')->nullable();
            $table->string('th_anh_mat_truoc')->nullable();
            $table->string('th_anh_mat_sau')->nullable();
            $table->string('th_anh_chan_dung')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hop_dong');
    }
};
