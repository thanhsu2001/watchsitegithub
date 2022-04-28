<x-layoutclient>
    <body class="sub_page">
        <section class="contact_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form_container">
                            <div class="heading_container">
                                <h2>
                                    Thông tin chủ tài khoản
                                </h2>
                            </div>
                            <form method="post" action="{{ route('user.luuthongtin') }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <x-input name="hoten" label="Tên" />
                                </div>
                                <div>
                                    <x-input type="email" name="email2" placeholder="Email" label="Email" />
                                </div>
                                <div>
                                    <x-input type="phone" name="sdt" placeholder="Phone number" label="Số điện thoại" />
                                </div>
                                <div>
                                    <input type="text" name="diachi" placeholder="Địa chỉ" label="Địa chỉ" />
                                </div>
                                <div>
                                    <x-input name="avt" label="ảnh đại diện" type="file"/>
                                </div>
                                <div class="mt-3">
                                    <label>
                                        <input name="gioitinh" type="checkbox">Bạn là nam?
                                    </label>
                                </div>
                                <div class="d-flex ">
                                    <button type="submit">
                                        Gửi
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="img-box">
                            <img src="{{ asset('storage/contact-img.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</x-layoutclient>
