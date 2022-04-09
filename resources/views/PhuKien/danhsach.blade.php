<x-layout title="Danh sách phụ kiện">

    <p class="text-center display-2">
        Phụ kiện
    </p>
    <a class="btn btn-success" type="button" href="{{ route('phukien.them') }}">Thêm</a>
    <div>bộ lọc tìm kiếm</div>
    <form action="">
        <div class="row">
            <div class="col">
                <x-input name="from" label="Từ(giá)" />
            </div>
            <div class="col">
                <x-input name="to" label="Đến(giá)" />
            </div>
            <div class="col">
                <x-danh-muc-component name="id_danhmuc" label="Danh mục" />
            </div>
            <div class="col">
                <x-dong-san-pham-component name="id_dong" label="Dòng phụ kiện" />
            </div>
            <div class="row my-3">
                <div class="col">
                    <button class="btn btn-primary">Tìm kiếm</button>
                </div>
            </div>
        </div>
    </form>
    <table class="table table-bordered">
        <tbody>
            <tr style="background-color: black;color:white">
                {{-- <td>#</td> --}}
                <td style="width: 200px;text-align:center;">Mã phụ kiện</td>
                <td style="width: 200px;text-align:center;">Tên phụ kiện</td>
                <td style="width: 200px;text-align:center;">Ảnh</td>
                {{-- <td>Mô tả</td> --}}
                <td>Giá</td>
                <td>Số lượng tồn</td>
                <td style="width: 100px;text-align:center;">Loại</td>
                <td style="width: 100px;text-align:center;">Dòng</td>
                <td style="width: 150px;text-align:center;">
                    Chức năng
                </td>
            </tr>
            @foreach ($data as $item)
                <tr>
                    {{-- <td>{{ $item->id }}</td> --}}
                    <td style="text-align:center">{{ $item->maphukien }}</td>
                    <td>{{ $item->tenphukien }}</td>
                    <td>
                        <img src="/storage/{{ $item->hinhanh }}" width="100">
                    </td>
                    <td>{{ $item->gia }}</td>
                    <td>{{ $item->soluong }}</td>
                    {{-- <td>{{ $item->mota }}</td> --}}
                    <td>{{ $item->danh_mucs->tendanhmuc ?? '' }}</td>
                    <td>{{ $item->dong_san_phams->tendong ?? '' }}</td>
                    <td style="width: 200px">
                        <a class="btn btn-outline-primary" href="{{ route('phukien.chitiet', ['id' => $item->id]) }}">Xem</a>
                        @if (Auth::user() )
                            @if (Auth::user()->is_admin)
                                <a class="btn btn-outline-warning" href="{{ route('phukien.sua', ['id' => $item->id]) }}">Sửa</a>
                                <a class="btn btn-outline-danger" href="{{ route('phukien.xoa', ['id' => $item->id]) }}">Xóa</a>
                            @endif
                        @endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        {{ $data->links() }}
    </div>
</x-layout>
