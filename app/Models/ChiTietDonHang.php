<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;

    public function donhang(){
        return $this->hasOne(HoaDon::class, "id", "iddonhang");
    }
}
