<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\SanPham;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AjaxController extends Controller
{
    public function getSanPham($listIds)
    {
        $cols = [
            "gia",
            "hinhanh",
            "id",
            "masanpham",
            "tensanpham"
        ];
        $ids = explode(",", $listIds);
        $data = SanPham::select($cols)->whereIn("id", $ids)->get();
        return response()->json($data);
    }
}
