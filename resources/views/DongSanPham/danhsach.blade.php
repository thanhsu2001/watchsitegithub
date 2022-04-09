<x-layout title="Danh sách dòng sản phẩm">

    <p class="text-center display-2">
        Dòng sản phẩm
    </p>
    <a class="btn btn-success" type="button" href="{{ route('dongsp.them') }}">Thêm</a>
    <table class="table table-bordered">
        <tbody>
            <tr style="background-color: black;color:white">
                {{-- <td>#</td> --}}
                <td style="width: 200px;text-align:center;">Dòng</td>
                <td style="width: 200px">
                    Ảnh
                </td>
                <td>Mô tả</td>
                <td style="width: 100px">Loại</td>
                <td style="width: 150px">
                    Chức năng
                </td>
            </tr>
            @foreach ($data as $item)
                <tr>
                    {{-- <td>{{ $item->id }}</td> --}}
                    <td style="text-align:center">{{ $item->tendong }}</td>
                    <td>
                        <img src="/storage/{{ $item->hinhanh }}" width="100">
                    </td>
                    <td>{{ $item->mota }}</td>
                    <td>{{ $item->danh_mucs->tendanhmuc ?? '' }}</td>
                    <td style="width: 200px">
                        <a class="btn btn-outline-primary" href="{{ route('dongsp.chitiet', ['id' => $item->id]) }}">Xem</a>
                        @if (Auth::user()->is_admin)
                            <a class="btn btn-outline-warning" href="{{ route('dongsp.sua', ['id' => $item->id]) }}">Sửa</a>
                            <a class="btn btn-outline-danger" href="{{ route('dongsp.xoa', ['id' => $item->id]) }}">Xóa</a>
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
