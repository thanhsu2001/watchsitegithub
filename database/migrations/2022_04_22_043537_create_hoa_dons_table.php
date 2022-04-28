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
        Schema::create('hoa_dons', function (Blueprint $table) {
            $table->id();
            $table->string('mahoadon')->nullable();
            $table->string('tenkh')->nullable();
            $table->string('sdtkh')->nullable();
            $table->string('email')->nullable();
            $table->string('diachi')->nullable();
            $table->bigInteger('total')->nullable();
            $table->bigInteger('shippingfee')->nullable();
            $table->string('discountcode')->nullable();
            $table->unsignedBigInteger('taikhoandathang')->nullable();
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
        Schema::dropIfExists('hoa_dons');
    }
};
