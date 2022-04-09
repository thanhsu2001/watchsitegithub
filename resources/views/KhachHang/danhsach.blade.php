<x-layout title="Danh mục sản phẩm">

    <p class="text-center display-2">
        Danh sách khách hàng
    </p>
    <a class="btn btn-success" type="button" href="{{ route('khachhang.them') }}">Thêm</a>
    <table class="table table-bordered">
        <tbody>
            @foreach ($data as $item)
            <tr>
                    <td>{{ $item->user->name ?? '' }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->mail }}</td>
                    <td>{{ $item->diachi }}</td>
                    {{-- <td>
                        <img src="/storage/{{ $item->hinhanh }}" width="100">
                    </td> --}}

                    <td>
                        <a href="{{ route('khachhang.chitiet', ['id' => $item->id]) }}">Xem</a>
                        @if (Auth::user())
                            @if (Auth::user()->is_admin)
                                <a href="{{ route('khachhang.sua', ['id' => $item->id]) }}">Sửa</a>
                                <a href="{{ route('khachhang.xoa', ['id' => $item->id]) }}">Xóa</a>
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
