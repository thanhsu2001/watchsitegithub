<x-layout title="Sửa dòng sản phẩm">


    <p class="text-center display-2">
        Sửa dòng sản phẩm
    </p>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    Dữ liệu không hợp lệ, vui lòng kiểm tra lại
                </div>
            @endif

            <form method="post" action="{{ route('dongsp.luu', ['id' => $dongsanpham->id]) }}" autocomplete="off"
                enctype="multipart/form-data">
                @csrf

                <x-input name="tendong" label="Tên dòng sản phẩm" value="{{ $dongsanpham->tendong ?? '' }}" />

                <x-input name="hinhanh" label="Hình ảnh" type="file" />
                <x-mst-select value="{{$dongsanpham->id_danhmuc}}" name="id_danhmuc" label="Thuộc danh mục: "
                        table="danh_mucs" displayColumn="tendanhmuc" />

                <x-input name="mota" label="Mô tả" value="{{ $dongsanpham->mota ?? '' }}" />

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Cập nhật dữ liệu</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
