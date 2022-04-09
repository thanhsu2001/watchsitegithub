<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DongSanPham extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function danh_mucs(){
        return $this->hasOne(DanhMuc::class, "id", "id_danhmuc");
    }
}
