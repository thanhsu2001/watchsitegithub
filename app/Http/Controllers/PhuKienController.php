<?php

namespace App\Http\Controllers;

use App\Models\PhuKien;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PhuKienController extends Controller
{
    public function danhsach(Request $request)
	{
		$from = $request->input('from');
		$to = $request->input('to');
		$id_danhmuc = $request->input('id_danhmuc');
		$id_dong = $request->input('id_dong');
		$tenphukien = null;
		$query = PhuKien::orderByDesc('id');

		if ($from) {
			$query->where('gia', ">=", $from);
		}
		if ($to) {
			$query->where('gia', "<=", $to);
		}
		if ($from) {
			$query->where('id_danhmuc', "=", $id_danhmuc);
		}
		if ($from) {
			$query->where('id_dong', "=", $id_dong);
		}
		if ($tenphukien) {
			$query->where('tenphukien', "like", "%$tenphukien%");
		}

		$result = $query->paginate();
		return view('/PhuKien/danhsach')->with('data', $result);
	}
    public function danhsachclient(Request $request)
	{
		$result = PhuKien::orderByDesc('id')->paginate();
		return view('/ViewClients/danhsachphukien')->with('data', $result);
	}

	function chitiet($id)
	{
		$phukien = PhuKien::findOrFail($id);
		return view('/PhuKien/chitiet', ['phukien' => $phukien]);
	}
	function chitietclient($id)
	{
		$phukien = PhuKien::findOrFail($id);
		return view('/ViewClients/chitietphukien', ['phukien' => $phukien]);
	}

	function them()
	{
		return view('/PhuKien/them');
	}

	function luu(Request $request, $id = null)
	{
		$data = $request->all();		// lấy dữ liệu nhận được từ request
		$this->customValidate($data);
		if ($id == null) {
			// Xử lý khi insert
			$action = "Thêm";
		} else {
			// Xử lý khi update
			$action = "Cập nhật";
		}
		try {
			unset($data["_token"]);			// loại bỏ giá trị _token từ request

			// Nhận file tải lên
			$file = $request->file('hinhanh');
			if ($file != null) {
				$filename = $file->hashName();	// Tên file ngẫu nhiên không trùng
				$file->storeAs("/public", $filename);
				$data["hinhanh"] = $filename;
			}
			
			$pk = PhuKien::updateOrCreate(['id' => $id], $data);
			return redirect()
				->route('phukien.danhsach')
				->with('success_mesg', "$action dữ liệu thành công");
		} catch (Exception $ex) {
			return redirect()
				->back()
				->withInput()
				->with('error_mesg', "$action dữ liệu thất bại (Chi tiết: " . $ex->getMessage() . ")");
		}
    }
    function sua($id)
	{
		$phukien = PhuKien::findOrFail($id);
		return view('/PhuKien/sua')->with('phukien', $phukien);
	}

	function xoa($id)
	{
		PhuKien::destroy($id);
		return redirect()->back();
	}

	private function customValidate($data){
		$rules = [
			"maphukien" 	=> ["required", "max:255"],	// bắt buộc, tối đa 2255 ký tự
			"tenphukien" 	=> ["required", "max:255"],	// bắt buộc, tối đa 2255 ký tự
			"hinhanh"		=> ["nullable", "image", "max:5000"],	// không bắt buộc, là ảnh, tối đa 500 KB
			"gia" 	=> ["required", "max:255"],	// bắt buộc, tối đa 2255 ký tự
		];

		$fields = [
			"maphukien" => "Mã sản phẩm",
			"tenphukien" => "Tên sản phẩm",
			"hinhanh" => "Hình ảnh",
			"gia" => "Giá",
			"soluong" => "Số lượng",
		];

		$validator = Validator::make($data, $rules, [], $fields);

		$validator->validate();		// gọi hàm xác thực dữ liệu
	}
}
