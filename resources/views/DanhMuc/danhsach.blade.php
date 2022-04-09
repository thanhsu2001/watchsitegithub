<x-layout title="Danh mục sản phẩm">

    <p class="text-center display-2">
        Danh mục sản phẩm
    </p>
    <a class="btn btn-success" type="button" href="{{ route('danhmuc.them') }}">Thêm</a>
    <table class="table table-bordered">
        <tbody>
            @foreach ($data as $item)
                <tr>
                    {{-- <td>{{ $item->id }}</td> --}}
                    <td>{{ $item->tendanhmuc }}</td>
                    {{-- <td>{{ $item->mota }}</td>
                    <td>{{ $item->gia }}</td>
                    <td>{{ $item->danh_mucs->tendanhmuc ?? '' }}</td> --}}
                    {{-- <td>
                        <img src="/storage/{{ $item->hinhanh }}" width="100">
                    </td> --}}

                    <td>
                        <a href="{{ route('danhmuc.chitiet', ['id' => $item->id]) }}">Xem</a>
                        @if (Auth::user())
                            @if (Auth::user()->is_admin)
                                <a href="{{ route('danhmuc.sua', ['id' => $item->id]) }}">Sửa</a>
                                <a href="{{ route('danhmuc.xoa', ['id' => $item->id]) }}">Xóa</a>
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
