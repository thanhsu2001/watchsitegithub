<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
	public function danhsach()
	{
		$result = Contact::orderByDesc('id')->paginate();
		return view('/managerment/danhsachcontact')->with('data', $result);
	}
	function them()
	{
		return view('/ViewClients/lienhe');
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

			unset($data["_token"]);

			$ct = Contact::updateOrCreate(['id' => $id], $data);
			return redirect()
				->route('home');
		} catch (Exception $ex) {
			return redirect()
				->route('home');
		}
	}
	private function customValidate($data)
	{
		$rules = [
			"fullname" 	=> ["required", "max:255"],
			"email" 	=> ["required", "max:255"],
			"phone"		=> ["required", "max:255"],
			"message" 			=> "required|max:255",
		];

		$fields = [
			"fullname" => "Tên đầy đủ",
			"email" => "Email",
			"phone" => "Số điện thoại",
			"message" => "Tin nhắn",
		];

		$validator = Validator::make($data, $rules, [], $fields);

		$validator->validate();
	}
	function xoa($id)
	{
		Contact::destroy($id);
		return redirect()->back();
	}
}
