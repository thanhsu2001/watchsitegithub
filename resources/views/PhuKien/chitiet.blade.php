<x-layout title="Chi tiết">


    <p class="text-center display-2">
        Thông tin
    </p>
    <p>Mã phụ kiện: {{ $phukien->maphukien }}</p>
    <p>Tên phụ kiện: {{ $phukien->tenphukien }}</p>
    {{-- <p>Loại: {{ danh_mucs()->}}</p>
    <p>Dòng: {{ $phukien->id_dong}}</p> --}}
    @if (!empty($phukien->hinhanh))
        <img src="{{ asset('/storage/' . $phukien->hinhanh) }}" height="200" class="d-block m-auto" alt="" />
    @endif
    <p>Giá: {{ $phukien->gia }}</p>
    <p>Mô tả: {{ $phukien->mota }}</p>
</x-layout>
