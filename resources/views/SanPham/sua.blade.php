<x-layout title="Sửa dòng sản phẩm">


    <p class="text-center display-2">
        Trang sửa dòng sản phẩm
    </p>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    Dữ liệu không hợp lệ, vui lòng kiểm tra lại
                </div>
            @endif

            <form method="post" action="{{ route('sanpham.luu', ['id' => $sanpham->id]) }}" autocomplete="off"
                enctype="multipart/form-data">
                @csrf

                <x-input name="masanpham" label="Mã sản phẩm" value="{{ $sanpham->masanpham ?? '' }}" />
                
                <x-input name="tensanpham" label="Tên sản phẩm" value="{{ $sanpham->tensanpham ?? '' }}" />
                    
                <x-input name="hinhanh" label="Hình ảnh" type="file" />
                <x-input name="gia" label="Giá" value="{{ $sanpham->gia}}" />
                <x-input name="soluong" label="Số lượng" value="{{ $sanpham->soluong}}" />
                <x-mst-select name="id_danhmuc" label="Danh mục sản phẩm"
                        table="danh_mucs" displayColumn="tendanhmuc" />
                <x-mst-select name="id_dong" label="Dòng sản phẩm"
                        table="dong_san_phams" displayColumn="tendong" />

                <x-input name="mota" label="Mô tả" value="{{ $sanpham->mota }}" />

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Cập nhật dữ liệu</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
