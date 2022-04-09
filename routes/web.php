<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DongSanPhamController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\PhuKienController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/admin', function () {
    return view('/managerment/homepageadmin');
})->name('admin')->middleware(["auth", "admin"]);

Route::prefix("/danh-muc")->middleware(["auth", "admin"])->namespace("App\Http\Controllers")->group(function () {

    Route::get("/danh-sach", 'DanhMucController@danhsach')
        ->name('danhmuc.danhsach');

    Route::get("/{id}/chi-tiet", [DanhMucController::class, 'chitiet'])
        ->name('danhmuc.chitiet');

    Route::get("/them", [DanhMucController::class, 'them'])
        ->name('danhmuc.them');

    Route::post("/luu/{id?}", [DanhMucController::class, 'luu'])
        ->name('danhmuc.luu');

    Route::get("/sua/{id}", [DanhMucController::class, 'sua'])
        ->name('danhmuc.sua');

    Route::get("/xoa/{id}", [DanhMucController::class, 'xoa'])
        ->name('danhmuc.xoa');
});
Route::prefix("/dong-san-pham")->middleware(["auth", "admin"])->namespace("App\Http\Controllers")->group(function () {

    Route::get("/danh-sach", 'DongSanPhamController@danhsach')
        ->name('dongsp.danhsach');

    Route::get("/{id}/chi-tiet", [DongSanPhamController::class, 'chitiet'])
        ->name('dongsp.chitiet');

    Route::get("/them", [DongSanPhamController::class, 'them'])
        ->name('dongsp.them');

    Route::post("/luu/{id?}", [DongSanPhamController::class, 'luu'])
        ->name('dongsp.luu');

    Route::get("/sua/{id}", [DongSanPhamController::class, 'sua'])
        ->name('dongsp.sua');

    Route::get("/xoa/{id}", [DongSanPhamController::class, 'xoa'])
        ->name('dongsp.xoa');
});
Route::prefix("/user")->middleware(["auth", "admin"])->namespace("App\Http\Controllers")->group(function () {

    Route::get('/addUser', [UserController::class, 'createUser'])->name('user.them');

    Route::post('/saveUser', [UserController::class, 'saveUser'])->name('user.save');

    Route::get('/listUser', [UserController::class, 'danhsach'])->name('user.danhsach');

    Route::get("/xoa/{id}", [UserController::class, 'xoa'])
        ->name('user.xoa');

    // Route::get('/infoUser',[UserController::class,'chitiet'])->name('user.info');
});

Route::get('/login', [UserController::class, 'LoginUser'])->name('user.login');

Route::post('/login', [UserController::class, 'Login'])->name('user.loginuser');

Route::get('/login-out', [UserController::class, 'logout'])->name('user.logout');

Route::prefix("/san-pham")->middleware(["auth", "admin"])->namespace("App\Http\Controllers")->group(function () {

    Route::get("/danh-sach", 'SanPhamController@danhsach')
        ->name('sanpham.danhsach');

    Route::get("/{id}/chi-tiet", [SanPhamController::class, 'chitiet'])
        ->name('sanpham.chitiet');

    Route::get("/them", [SanPhamController::class, 'them'])
        ->name('sanpham.them');

    Route::post("/luu/{id?}", [SanPhamController::class, 'luu'])
        ->name('sanpham.luu');

    Route::get("/sua/{id}", [SanPhamController::class, 'sua'])
        ->name('sanpham.sua');

    Route::get("/xoa/{id}", [SanPhamController::class, 'xoa'])
        ->name('sanpham.xoa');
});
Route::prefix("/phu-kien")->middleware(["auth", "admin"])->namespace("App\Http\Controllers")->group(function () {

    Route::get("/danh-sach", 'PhuKienController@danhsach')
        ->name('phukien.danhsach');

    Route::get("/{id}/chi-tiet", [PhuKienController::class, 'chitiet'])
        ->name('phukien.chitiet');

    Route::get("/them", [PhuKienController::class, 'them'])
        ->name('phukien.them');

    Route::post("/luu/{id?}", [PhuKienController::class, 'luu'])
        ->name('phukien.luu');

    Route::get("/sua/{id}", [PhuKienController::class, 'sua'])
        ->name('phukien.sua');

    Route::get("/xoa/{id}", [PhuKienController::class, 'xoa'])
        ->name('phukien.xoa');
});

Route::prefix("/client")->namespace("App\Http\Controllers")->group(function () {

    Route::get("/danh-sach", 'SanPhamController@danhsachclient')
        ->name('client.danhsachsp'); //danh sách sản phẩm

    Route::get("/{id}/chi-tiet-sp", 'SanPhamController@chitietclient')
        ->name('client.chitietsanpham'); //thông tin chi tiết sản phẩm

    Route::get('/about', function () {
        return view('/ViewClients/thongtinweb');
    })->name('client.about'); //giới thiệu trang web

    Route::get('/contact', function () {
        return view('/ViewClients/lienhe');
    })->name('client.contact'); //liên hệ với quản trị viên

    Route::get("/them", [ContactController::class, 'them'])
        ->name('client.contact.them'); //trang liên hệ

    Route::post("/luu/{id?}", [ContactController::class, 'luu'])
        ->name('client.contact.luu');

    Route::get("/lienhe", [ContactController::class, 'danhsach'])
        ->name('client.contact.message');

    Route::get("/xoa/{id}", [ContactController::class, 'xoa'])
        ->name('client.contact.delete');

    Route::get("/danh-sach-pk", 'PhuKienController@danhsachclient')
        ->name('client.danhsachpk');

    Route::get("/{id}/chi-tiet-pk", 'PhuKienController@chitietclient')
        ->name('client.chitietphukien');
});

Route::prefix("/khach-hang")->middleware(["auth"])->namespace("App\Http\Controllers")->group(function(){

    Route::get("/danh-sach", 'KhachHangController@danhsach')
    ->name('khachhang.danhsach');

    Route::get("/{id}/chi-tiet", [KhachHangController::class, 'chitiet'])
    ->name('khachhang.chitiet');

    Route::get("/them", [KhachHangController::class, 'them'])
    ->name('khachhang.them');

    Route::post("/luu/{id?}", [KhachHangController::class, 'luu'])
    ->name('khachhang.luu');

    Route::get("/sua/{id}", [KhachHangController::class, 'sua'])
    ->name('khachhang.sua');

    Route::get("/xoa/{id}", [KhachHangController::class, 'xoa'])
    ->name('khachhang.xoa');

});