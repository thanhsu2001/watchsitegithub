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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('masanpham')->nullable();
            $table->string('tensanpham')->nullable();
            $table->string('hinhanh')->nullable();
            $table->decimal('gia')->nullable();
            $table->text('mota')->nullable();
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
        Schema::dropIfExists('san_phams');

        Schema::table('san_phams', function (Blueprint $table) {
            $table->id();
            $table->dropColumn('masanpham');
            $table->dropColumn('tensanpham');
            $table->dropColumn('hinhanh');
            $table->dropColumn('gia');
            $table->dropColumn('mota');
            $table->timestamps();
        });
    }
};
