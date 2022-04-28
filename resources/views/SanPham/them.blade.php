<x-layout title="Thêm sản phẩm">
    <p class="text-center display-2">
        Thêm sản phẩm
    </p>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    Dữ liệu không hợp lệ, vui lòng kiểm tra lại
                </div>
            @endif

            <form method="post" action="{{ route('sanpham.luu') }}" autocomplete="off" enctype="multipart/form-data">
                @csrf

                <x-input name="masanpham" label="Mã sản phẩm" />
                <x-input name="tensanpham" label="Tên sản phẩm" />
                <x-mst-select name="id_danhmuc" label="Danh mục sản phẩm" table="danh_mucs"
                    displayColumn="tendanhmuc" />
                <x-mst-select name="id_dong" label="Dòng sản phẩm" table="dong_san_phams"
                    displayColumn="tendong" />
                {{-- Hoặc --}}
                {{-- <x-danh-muc-component name="id_danhmuc" label="Danh mục sản phẩm" /> --}}
                <x-input name="hinhanh" label="Hình ảnh" type="file" multiple />
                <x-input name="gia" label="Giá sản phẩm" />
                <x-input name="soluong" label="Số lượng" />
                <x-input name="mota" label="Mô tả" />
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Thêm dữ liệu</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
