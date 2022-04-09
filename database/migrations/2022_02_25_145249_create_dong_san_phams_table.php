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
        Schema::create('dong_san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('tendong')->nullable();
            $table->text('mota')->nullable();
            $table->timestamps();
        });
        Schema::table("dong_san_phams", function(Blueprint $table){
            $table->unsignedBigInteger("id_danhmuc")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dong_san_phams');

        Schema::table('dong_san_phams', function (Blueprint $table) {
            $table->dropColumn("tendong");
            $table->dropColumn("mota");
            $table->dropColumn("id_danhmuc");
        });
    }
};
