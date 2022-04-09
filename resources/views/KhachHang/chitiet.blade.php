<x-layout title="Chi tiết danh mục sản phẩm">


    <p class="text-center display-2">
        Thông tin chi tiết khách hàng
    </p>
    {{-- @if (!empty($sanpham->hinhanh))
        <img src="{{ asset('/storage/' . $sanpham->hinhanh) }}" height="200" class="d-block m-auto" alt="" />
    @endif --}}

    <p>Họ tên khách hàng: {{ $khachhang->hotenkh }}</p>
    <p>Tên đăng nhập: {{ $khachhang->nameuser }}</p>
    <p>Email: {{ $khachhang->mail }}</p>
    <p>Địa chỉ: {{ $khachhang->diachi }}</p>
    <p>Số điện thoại: {{ $khachhang->phone }}</p>

</x-layout>
