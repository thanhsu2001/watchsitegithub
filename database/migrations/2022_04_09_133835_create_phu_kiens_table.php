<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phu_kiens', function (Blueprint $table) {
            $table->id();
            $table->string('masanpham')->nullable();
            $table->string('tensanpham')->nullable();
            $table->string('hinhanh')->nullable();
            $table->bigInteger('gia')->nullable();
            $table->bigInteger('soluong')->nullable();
            $table->longText('mota')->nullable();
            $table->string('id_danhmuc')->nullable();
            $table->string('id_dong')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phu_kiens');

        Schema::create('phu_kiens', function (Blueprint $table) {
            $table->id();
            $table->dropColumn('maphukien');
            $table->dropColumn('tenphukien');
            $table->dropColumn('hinhanh');
            $table->dropColumn('gia');
            $table->dropColumn('soluong');
            $table->dropColumn('mota');
            $table->dropColumn('id_danhmuc');
            $table->dropColumn('id_dong');
            $table->timestamps();
        });
    }
};
