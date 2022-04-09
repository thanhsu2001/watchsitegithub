<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DanhMucController extends Controller
{
	public function danhsach()
	{
		$result = DanhMuc::orderByDesc('id')->paginate();
		return view('/DanhMuc/danhsach')->with('data', $result);
	}

	function chitiet($id)
	{
		$danhmuc = DanhMuc::findOrFail($id);
		return view('/DanhMuc/chitiet', ['danhmuc' => $danhmuc]);
	}

	function them()
	{
		return view('/DanhMuc/them');
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
			// $file = $request->file('hinhanh');
			// if ($file != null) {
			// 	$filename = $file->hashName();	// Tên file ngẫu nhiên không trùng
			// 	$file->storeAs("/public", $filename);
			// 	$data["hinhanh"] = $filename;
			// }
			$sp = DanhMuc::updateOrCreate(['id' => $id], $data);
			return redirect()
				->route('danhmuc.danhsach')
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
		$danhmuc = DanhMuc::findOrFail($id);
		return view('/DanhMuc/sua')->with('danhmuc', $danhmuc);
	}

	function xoa($id)
	{
		DanhMuc::destroy($id);
		return redirect()->back();
	}

	private function customValidate($data){
		$rules = [
			"tendanhmuc" 	=> ["required", "max:255"],
		];

		$fields = [
			"tendanhmuc" => "Tên danh mục",
		];

		$validator = Validator::make($data, $rules, [], $fields);

		$validator->validate();		// gọi hàm xác thực dữ liệu
	}
}
