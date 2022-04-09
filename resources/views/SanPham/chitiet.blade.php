<x-layout title="Chi tiết">


    <p class="text-center display-2">
        Thông tin
    </p>
    <p>Mã sản phẩm: {{ $sanpham->masanpham }}</p>
    <p>Tên sản phẩm: {{ $sanpham->tensanpham }}</p>
    {{-- <p>Loại: {{ danh_mucs()->}}</p>
    <p>Dòng: {{ $sanpham->id_dong}}</p> --}}
    @if (!empty($sanpham->hinhanh))
        <img src="{{ asset('/storage/' . $sanpham->hinhanh) }}" height="200" class="d-block m-auto" alt="" />
    @endif
    <p>Giá: {{ $sanpham->gia }}</p>
    <p>Mô tả: {{ $sanpham->mota }}</p>
</x-layout>
