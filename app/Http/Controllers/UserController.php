<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
    public function createUser(){
        return view("/User/them");
    }
    public function saveUser(Request $request){
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
    public function LoginUser(){
        return view("/User/dangnhap");
    }
    public function Login(Request $request){
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
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
