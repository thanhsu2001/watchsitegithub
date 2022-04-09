<x-layout title="Chi tiết danh mục sản phẩm">


    <p class="text-center display-2">
        Đây là chi tiết danh mục sản phẩm
    </p>
    {{-- @if (!empty($sanpham->hinhanh))
        <img src="{{ asset('/storage/' . $sanpham->hinhanh) }}" height="200" class="d-block m-auto" alt="" />
    @endif --}}

    <p>Tên danh mục: {{ $danhmuc->tendanhmuc }}</p>

</x-layout>
