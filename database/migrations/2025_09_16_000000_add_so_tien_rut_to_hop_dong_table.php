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
			$table->string('so_tien_rut')->default('0')->after('cho_phep_rut_tien');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::table('hop_dong', function (Blueprint $table) {
			$table->dropColumn('so_tien_rut');
		});
	}
};


