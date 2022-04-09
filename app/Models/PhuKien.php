<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhuKien extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function danh_mucs(){
        return $this->hasOne(DanhMuc::class, "id", "id_danhmuc");
    }
    public function dong_san_phams(){
        return $this->hasOne(DongSanPham::class, "id", "id_dong");
    }
}
