<x-layout title="Thêm danh mục sản phẩm">
    <p class="text-center display-2">
        Đây là trang thêm danh mục sản phẩm
    </p>
    
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    Dữ liệu không hợp lệ, vui lòng kiểm tra lại
                </div>
            @endif

            <form method="post" action="{{ route('danhmuc.luu') }}" autocomplete="off" enctype="multipart/form-data">
                @csrf

                <x-input name="tendanhmuc" label="Tên danh mục" />

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Thêm dữ liệu</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
