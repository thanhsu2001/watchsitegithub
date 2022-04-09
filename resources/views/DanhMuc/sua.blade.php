<x-layout title="Sửa sản phẩm">


    <p class="text-center display-2">
        Đây là trang sửa
    </p>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    Dữ liệu không hợp lệ, vui lòng kiểm tra lại
                </div>
            @endif

            <form method="post" action="{{ route('danhmuc.luu', ['id' => $danhmuc->id]) }}" autocomplete="off"
                enctype="multipart/form-data">
                @csrf

                <x-input name="tendanhmuc" label="Tên danh mục" value="{{ $danhmuc->tendanhmuc ?? '' }}" />

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Cập nhật dữ liệu</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
