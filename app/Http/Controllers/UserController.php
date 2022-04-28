<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // public function chitiet($id){
    //     $user = User::findOrFail($id);
    // 	return view('/User/chitiet', ['user' => $user]);
    // }
    public function danhsach()
    {
        $result = User::orderByDesc('id')->paginate();
        return view('/User/danhsach')->with('data', $result);
    }
    function xoa($id)
    {
        User::destroy($id);
        return redirect()->back();
    }
    public function createUser()
    {
        return view("/User/them");
    }
    public function saveUser(Request $request)
    {
        $data = $request->all();
        $rules = [
            "name" => ["required"],
            "email" => ["required", "email", "unique:users"],
            "password" => ["required", "min:4"],
            "confirmPassword" => ["same:password"]
        ];
        $fields = [
            "name" => "Họ tên",
            "email" => "Email",
            "password" => "Password",
            "confirmPassword" => "Xác nhận mật khẩu",
        ];
        $validator = Validator::make($data, $rules, [], $fields);
        $validator->validate();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = isset($request->is_admin) ? true : false;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('user.login');
    }
    public function LoginUser()
    {
        return view("/User/dangnhap");
    }
    public function Login(Request $request)
    {
        //check pass
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Tài khoản hoặc mật khẩu không chính xác',
        ]);

        //Xac thuc pass
        $userData = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($userData)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        } else {
            return redirect()->route('user.login');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    //thongtin
    function themthongtin()
    {
        return view('/ViewClients/thongtinchutaikhoan');
    }

    function luuthongtin(Request $request, $id = null)
    {
        $data = $request->all();        // lấy dữ liệu nhận được từ request
        $this->customValidate($data);
        if ($id == null) {
            // Xử lý khi insert
            $action = "Thêm";
        } else {
            // Xử lý khi update
            $action = "Cập nhật";
        }
        try {
            unset($data["_token"]);            // loại bỏ giá trị _token từ request
            // dd($data);
            // Nhận file tải lên
            $file = $request->file('avt');
            if ($file != null) {
                $filename = $file->hashName();    // Tên file ngẫu nhiên không trùng
                $file->storeAs("/public", $filename);
                $data["avt"] = $filename;
            }
            $us = User::updateOrCreate(['id' => $id], $data);
            return redirect()
                ->route('home');
        } catch (Exception $ex) {
            return redirect()
                ->back()
                ->withInput();
        }
    }
    // function sua($id)
    // {
    // 	$user = User::findOrFail($id);
    // 	return view('/Vi/sua')->with('sanpham', $user);
    // }

    private function customValidate($data)
    {
        $rules = [
            "hoten"     => ["required", "max:255"],    // bắt buộc, tối đa 2255 ký tự
            "diachi"     => ["required", "max:255"],    // bắt buộc, tối đa 2255 ký tự
            "avt"        => ["nullable", "image", "max:5000"],    // không bắt buộc, là ảnh, tối đa 500 KB
            "sdt"     => ["required", "max:255"],    // bắt buộc, tối đa 2255 ký tự
            "gioitinh"     => ["required", "max:255"],    // bắt buộc, tối đa 2255 ký tự
            "email2"             => "required|max:255",    // bắt buộc, tối đa 255 ký tự
        ];

        $fields = [
            "hoten" => "Họ tên người dùng",
            "diachi" => "Địa chỉ",
            "avt" => "Ảnh đại diện",
            "gioitinh" => "Giới tính",
            "email2" => "Email",
            "sdt" => "Số điện thoại",
        ];

        $validator = Validator::make($data, $rules, [], $fields);

        $validator->validate();        // gọi hàm xác thực dữ liệu
    }
}
