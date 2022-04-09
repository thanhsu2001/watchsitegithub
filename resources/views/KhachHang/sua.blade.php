<x-layout title="Sửa thông tin cá nhân">
    <p class="text-center display-2">
        Sửa thông tin cá nhân
    </p>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    Dữ liệu không hợp lệ, vui lòng kiểm tra lại
                </div>
            @endif

            <form method="post" action="{{ route('khachhang.luu', ['id' => $khachhang->id]) }}" autocomplete="off"
                enctype="multipart/form-data">
                @csrf

                <x-input name="makhachhang" label="Mã khách hàng" value="{{ $khachhang->makhachhang ?? '' }}" />
                <x-input name="hotenkh" label="Tên khách hàng" value="{{ $khachhang->hotenkh ?? '' }}" />
                <x-input name="nameuser" label="Tên người dùng" value="{{ $khachhang->nameuser ?? '' }}" />
                <x-input name="mail" label="Địa chỉ mail" value="{{ $khachhang->mail ?? '' }}" />
                <x-input name="diachi" label="Địa chỉ" value="{{ $khachhang->diachi ?? '' }}" />
                <x-input name="phone" label="Số điện thoại" value="{{ $khachhang->phone ?? '' }}" />

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Cập nhật dữ liệu</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
