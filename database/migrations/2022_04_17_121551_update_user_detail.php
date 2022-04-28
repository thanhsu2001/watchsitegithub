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
        Schema::table('users', function (Blueprint $table) {
            $table->string('hoten')->nullable();
            $table->string('avt')->nullable();
            $table->string('diachi')->nullable();
            $table->boolean('gioitinh')->nullable();
            $table->string('sdt')->nullable();
            $table->string('email2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('hoten');
            $table->dropColumn('avt');
            $table->dropColumn('diachi');
            $table->dropColumn('gioitinh');
            $table->dropColumn('sdt');
            $table->dropColumn('email2');
        });
    }
};
