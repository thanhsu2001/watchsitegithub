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
            $table()->string('hoten')->nullable();
            $table()->string('diachi')->nullable();
            $table()->bigInteger('phone')->nullable();
            $table()->boolean('sex')->nullable();
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
            $table()->dropColumn('hoten');
            $table()->dropColumn('phone');
            $table()->dropColumn('diachi');
            $table()->dropColumn('sex');
        });
    }
};
