<x-layout title="Thêm thông tin khách hàng">
    <p class="text-center display-2">
        Thêm thông tin người dùng
    </p>
    <form action="{{ route('khachhang.luu') }}" method="post">
        @csrf
        <x-input name="tenkhachhang" value=""  type="text" label="Họ tên" />
        <x-input name="diachi" type="text" label="Địa chỉ" />
        <x-input name="phone" type="" label="Số điện thoại" />
        <div class="mt-3">
            <button class="btn btn-success" type="submit">Cập nhật thông tin</button>
        </div>
    </form>
</x-layout>
