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
        Schema::create('chi_tiet_dh', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_hoa_don');
            $table->bigInteger('id_san_pham');
            $table->integer('so_luong');
            $table->integer('don_gia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_dh');
    }
};
