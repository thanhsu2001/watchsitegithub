<x-layout title="Chi tiết">


    <p class="text-center display-2">
        Thông tin
    </p>
    <p>Dòng sản phẩm: {{ $dongsanpham->tendong }}</p>
    @if (!empty($dongsanpham->hinhanh))
        <img src="{{ asset('/storage/' . $dongsanpham->hinhanh) }}" height="200" class="d-block m-auto" alt="" />
    @endif
    <p>Mô tả: {{ $dongsanpham->mota }}</p>
</x-layout>
