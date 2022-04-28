<x-layout title="Liên hệ">

    <p class="text-center display-2">
        Khách hàng liên hệ
    </p>    
    <table class="table table-bordered">
        <tbody>
            <tr style="background-color: black;color:white">
                {{-- <td>#</td> --}}
                <td style="width: 200px;text-align:center;">Tên khách hàng</td>
                <td style="width: 300px">
                    Email
                </td>
                <td>Số điện thoại</td>
                <td style="width: 500px">Lời nhắn</td>
            </tr>
            @foreach ($data as $item)
                <tr>
                    {{-- <td>{{ $item->id }}</td> --}}
                    <td style="text-align:center">{{ $item->fullname }}</td>
                    <td>
                        {{ $item->email }}
                    </td>
                    <td style="text-align:center">{{ $item->phone }}</td>
                    <td>{{ $item->message }}</td>
                    <td style="width: 70px">
                        <a class="btn btn-outline-danger" href="{{ route('client.contact.delete', ['id' => $item->id]) }}">Xóa</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        {{ $data->links() }}
    </div>
</x-layout>
