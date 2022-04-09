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
        Schema::table('phu_kiens', function (Blueprint $table) {
            $table->dropColumn('masanpham');
            $table->dropColumn('tensanpham');
            $table->string('maphukien')->nullable();
            $table->string('tenphukien')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phu_kiens', function (Blueprint $table) {
            $table->dropColumn('maphukien');
            $table->dropColumn('tenphukien');
        });
    }
};
