<x-layout title="Thêm dòng sản phẩm">
    <p class="text-center display-2">
        Thêm dòng sản phẩm
    </p>
    
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    Dữ liệu không hợp lệ, vui lòng kiểm tra lại
                </div>
            @endif

            <form method="post" action="{{ route('dongsp.luu') }}" autocomplete="off" enctype="multipart/form-data">
                @csrf

                <x-input name="tendong" label="Tên dòng" />
                {{-- Hoặc --}}
                {{-- <x-danh-muc-component name="id_danhmuc" label="Danh mục sản phẩm" /> --}}
                <x-input name="hinhanh" label="Hình ảnh" type="file" />

                
                        
                <x-input name="mota" label="Mô tả" />
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Thêm dữ liệu</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
