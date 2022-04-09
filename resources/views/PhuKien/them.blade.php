<x-layout title="Thêm phụ kiện">
    <p class="text-center display-2">
        Thêm phụ kiện
    </p>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    Dữ liệu không hợp lệ, vui lòng kiểm tra lại
                </div>
            @endif

            <form method="post" action="{{ route('phukien.luu') }}" autocomplete="off" enctype="multipart/form-data">
                @csrf

                <x-input name="maphukien" label="Mã phụ kiện" />
                <x-input name="tenphukien" label="Tên phụ kiện" />
                <x-mst-select name="id_danhmuc" label="Danh mục phụ kiện" table="danh_mucs"
                    displayColumn="tendanhmuc" />
                <x-mst-select name="id_dong" label="Dòng phụ kiện" table="dong_san_phams"
                    displayColumn="tendong" />
                {{-- Hoặc --}}
                {{-- <x-danh-muc-component name="id_danhmuc" label="Danh mục phụ kiện" /> --}}
                <x-input name="hinhanh" label="Hình ảnh" type="file" />
                <x-input name="gia" label="Giá phụ kiện" />
                <x-input name="soluong" label="Số lượng" />
                <x-input name="mota" label="Mô tả" />
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Thêm dữ liệu</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
