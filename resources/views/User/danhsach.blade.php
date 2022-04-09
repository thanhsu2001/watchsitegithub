<x-layout title="Danh sách sản phẩm">

    <p class="text-center display-2">
        Người dùng
    </p>
    <a class="btn btn-success" type="button" href="{{ route('user.them') }}">Thêm</a>

    <table class="table table-bordered">
        <tbody>
            <tr style="background-color: black;color:white">
                {{-- <td>#</td> --}}
                <td style="width: 200px;text-align:center;">Tên người dùng</td>
                <td style="width: 400px;text-align:center;">Email</td>
                <td style="width: 200px;text-align:center;">Loại tài khoản</td>
                <td></td>
            </tr>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td style="text-align: center">@if ($item->is_admin==1)
                        Admin
                    @else
                        User
                    @endif</td>

                    <td style="width: 200px;text-align:center">
                        <a class="btn btn-outline-danger" href="{{ route('user.xoa', ['id' => $item->id]) }}">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        {{ $data->links() }}
    </div>
</x-layout>
