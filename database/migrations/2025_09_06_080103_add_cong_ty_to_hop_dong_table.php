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
            $table->unsignedBigInteger('cong_ty_id')->nullable()->after('loai_hop_dong');
            $table->foreign('cong_ty_id')->references('id')->on('cong_ty')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hop_dong', function (Blueprint $table) {
            $table->dropForeign(['cong_ty_id']);
            $table->dropColumn('cong_ty_id');
        });
    }
};
