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
        Schema::table('san_phams', function (Blueprint $table) {
            $table->dropColumn('tendanhmuc');
            $table->dropColumn('tendong');
            $table->string('id_danhmuc')->nullable();
            $table->string('id_dong')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('san_phams', function (Blueprint $table) {
            $table->dropColumn('id_danhmuc');
            $table->dropColumn('id_dong');
        });
    }
};
