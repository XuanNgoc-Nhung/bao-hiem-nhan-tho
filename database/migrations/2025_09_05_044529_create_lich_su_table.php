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
        Schema::create('lich_su', function (Blueprint $table) {
            $table->id();
            $table->string('nguoi_dung')->nullable();
            $table->string('hanh_dong')->nullable();
            $table->string('chi_tiet')->nullable();
            $table->string('thoi_gian')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_su');
    }
};
