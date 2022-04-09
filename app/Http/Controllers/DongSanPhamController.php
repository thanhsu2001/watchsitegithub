<?php

namespace App\Http\Controllers;

use App\Models\DongSanPham;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DongSanPhamController extends Controller
{
	public function danhsach()
	{
		$result = DongSanPham::orderByDesc('id')->paginate();
		return view('/DongSanPham/danhsach')->with('data', $result);
	}

	function chitiet($id)
	{
		$dongsanpham = DongSanPham::findOrFail($id);
		return view('/DongSanPham/chitiet', ['dongsanpham' => $dongsanpham]);
	}

	function them()
	{
		return view('/DongSanPham/them');
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
			$sp = DongSanPham::updateOrCreate(['id' => $id], $data);
			return redirect()
				->route('dongsp.danhsach')
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
		$dongsanpham = DongSanPham::findOrFail($id);
		return view('/DongSanPham/sua')->with('dongsanpham', $dongsanpham);
	}

	function xoa($id)
	{
		DongSanPham::destroy($id);
		return redirect()->back();
	}

	private function customValidate($data){
		$rules = [
			"tendong" 	=> ["required", "max:255"],	// bắt buộc, tối đa 2255 ký tự
			"hinhanh"		=> ["nullable", "image", "max:5000"],	// không bắt buộc, là ảnh, tối đa 500 KB
			"mota" 			=> "required|max:255",	// bắt buộc, tối đa 255 ký tự
		];

		$fields = [
			"tendong" => "Tên dòng sản phẩm",
			"hinhanh" => "Hình ảnh",
			"mota" => "Mô tả",
		];

		$validator = Validator::make($data, $rules, [], $fields);

		$validator->validate();		// gọi hàm xác thực dữ liệu
	}
}
