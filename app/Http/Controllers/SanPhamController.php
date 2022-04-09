<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SanPhamController extends Controller
{
    public function danhsach(Request $request)
	{
		$from = $request->input('from');
		$to = $request->input('to');
		$id_danhmuc = $request->input('id_danhmuc');
		$id_dong = $request->input('id_dong');
		$tensp = null;
		$query = SanPham::orderByDesc('id');

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
		if ($tensp) {
			$query->where('tensanpham', "like", "%$tensp%");
		}

		$result = $query->paginate();
		return view('/SanPham/danhsach')->with('data', $result);
	}
    public function danhsachclient(Request $request)
	{
		$result = SanPham::orderByDesc('id')->paginate();
		return view('/ViewClients/danhsachsanpham')->with('data', $result);
	}

	function chitiet($id)
	{
		$sanpham = SanPham::findOrFail($id);
		return view('/SanPham/chitiet', ['sanpham' => $sanpham]);
	}
	function chitietclient($id)
	{
		$sanpham = SanPham::findOrFail($id);
		return view('/ViewClients/chitietsanpham', ['sanpham' => $sanpham]);
	}

	function them()
	{
		return view('/SanPham/them');
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
			
			$sp = SanPham::updateOrCreate(['id' => $id], $data);
			return redirect()
				->route('sanpham.danhsach')
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
		$sanpham = SanPham::findOrFail($id);
		return view('/SanPham/sua')->with('sanpham', $sanpham);
	}

	function xoa($id)
	{
		SanPham::destroy($id);
		return redirect()->back();
	}

	private function customValidate($data){
		$rules = [
			"masanpham" 	=> ["required", "max:255"],	// bắt buộc, tối đa 2255 ký tự
			"tensanpham" 	=> ["required", "max:255"],	// bắt buộc, tối đa 2255 ký tự
			"hinhanh"		=> ["nullable", "image", "max:5000"],	// không bắt buộc, là ảnh, tối đa 500 KB
			"gia" 	=> "required|numeric|min:1|max:9999999",	// bắt buộc, tối đa 2255 ký tự
			"gia" 	=> ["required", "max:255"],	// bắt buộc, tối đa 2255 ký tự
			"mota" 			=> "required|max:255",	// bắt buộc, tối đa 255 ký tự
		];

		$fields = [
			"masanpham" => "Mã sản phẩm",
			"tensanpham" => "Tên sản phẩm",
			"hinhanh" => "Hình ảnh",
			"gia" => "Giá",
			"soluong" => "Số lượng",
			"mota" => "Mô tả",
		];

		$validator = Validator::make($data, $rules, [], $fields);

		$validator->validate();		// gọi hàm xác thực dữ liệu
	}
}
