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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admin_id');
            $table->bigInteger('km_id')->nullable();
            $table->bigInteger('dm_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->integer('status')->default(1);
            $table->bigInteger('trademark_id'); // nhãn hiệu
            
            // màn hình
            $table->text('screen');

            // camera sau rear_camera
            $table->text('r_camera');

            // camera trước front_camera
            $table->text('f_camera');

            // Hệ điều hành & CPU
            $table->string('processor'); // vi sử lý
            $table->string('cpu'); // tốc độ cpu
            $table->string('gpu'); // Vi xử lý đồ họa (GPU)	
            $table->string('operating_system'); // hệ điều hành

            // Bộ nhớ & Lưu trữ
            $table->string('ram');
            $table->string('rom'); //Bộ nhớ trong	
            
            // Kết nối
            $table->text('connect');
           
            // Pin & Sạc
            $table->text('battery_charger');
            
            // Thông tin chung
            $table->text('general');
            
            // mô tả sản phẩm
            $table->text('descriptions')->nullable(); // mô tả


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
