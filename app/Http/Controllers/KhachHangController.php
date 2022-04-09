<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KhachHangController extends Controller
{
    public function danhsach(Request $request)
	{
        $result = KhachHang::orderByDesc('id')->paginate();
		return view('/KhachHang/danhsach')->with('data', $result);
	}

	function chitiet($id)
	{
		$khachhang = KhachHang::findOrFail($id);
		return view('/KhachHang/chitiet', ['khachhang' => $khachhang]);
	}

	function them()
	{
		return view('/KhachHang/them');
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
			$kh = KhachHang::updateOrCreate(['id' => $id], $data);
			return redirect()
				->route('khachhang.danhsach')
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
		$khachhang = KhachHang::findOrFail($id);
		return view('/KhachHang/sua')->with('khachhang', $khachhang);
	}

	function xoa($id)
	{
		KhachHang::destroy($id);
		return redirect()->back();
	}

	private function customValidate($data){
		$rules = [
			"makhachhang" 	=> ["required", "max:255"],	// bắt buộc, tối đa 2255 ký tự
			"tenkhachhang" 	=> ["required", "max:255"],	// bắt buộc, tối đa 2255 ký tự
			"mail"		=> ["nullable", "image", "max:5000"],	// không bắt buộc, là ảnh, tối đa 500 KB
			"phone" 	=> "required|numeric|min:1|max:9999999",	// bắt buộc, tối đa 2255 ký tự
			"diachi" 			=> "required|max:255",	// bắt buộc, tối đa 255 ký tự
		];

		$fields = [
			"makhachhang" => "id khách hàng",
			"tenkhachhang" => "Tên khách hàng",
			"mail" => "Email",
			"phone" => "Số điện thoại",
			"diachi" => "Địa chỉ",
		];

		$validator = Validator::make($data, $rules, [], $fields);

		$validator->validate();		// gọi hàm xác thực dữ liệu
	}
}

