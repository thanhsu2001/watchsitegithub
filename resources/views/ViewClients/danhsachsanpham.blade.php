<x-layoutclient>
    <body class="sub_page">
        <!-- shop section -->
        <section class="shop_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Sản phẩm mới nhất
                    </h2>
                </div>
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="box">
                            <a href="">
                                <div class="img-box">
                                    <img src="{{ asset('storage/w1.png') }}" alt="">
                                </div>
                                <div class="detail-box">
                                    <h6>
                                        Smartwatch
                                    </h6>
                                    <h6>
                                        Price:
                                        <span>
                                            $300
                                        </span>
                                    </h6>
                                </div>
                                <div class="new">
                                    <span>
                                        Featured
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                    @foreach ($data as $item)
                        <div class="col-md-6 col-xl-3">
                            <div class="box">
                                <a href="{{ route('client.chitietsanpham', ['id' => $item->id]) }}"   >
                                    <div class="img-box">
                                        <img src="/storage/{{ $item->hinhanh }}" width="100">
                                    </div>
                                    <div class="detail-box">
                                        <h6>
                                            {{ $item->tensanpham }}
                                        </h6>
                                        <h6>
                                            Giá:
                                            <span>
                                                {{ number_format((float)$item->gia)  }} <u>vnđ</u>                                            </span>
                                        </h6>
                                    </div>
                                    <div class="new">
                                        <span>
                                            Featured
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="btn-box">
                    <a href="">
                        Xem thêm
                    </a>
                </div>
            </div>
        </section>
</x-layoutclient>
