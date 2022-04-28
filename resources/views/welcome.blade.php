<x-layoutclient>
    <div class="hero_area">
        {{-- <div class="hero_social">
            <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
        </div> --}}
        <!-- slider section -->
        <section class="slider_section ">
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container-fluid ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="detail-box">
                                        <h1>
                                            Đồng hồ thông minh
                                        </h1>
                                        <p>
                                            Đồng hồ thông minh là một thiết bị đeo tay có các tính năng của một chiếc
                                            đồng hồ bình thường với những tính năng: xem giờ, hẹn giờ, báo thức,... Điểm
                                            khác biệt của nó là có thêm những tính năng thông minh hiện đại như: Chăm
                                            sóc sức khỏe, đo nhịp tim, bước đi,...
                                        </p>
                                        <p>
                                            Ngoài ra đồng hồ thông minh có thể tương tác với điện thoại smartphone để
                                            nhận và trả lời tin nhắn hay cuộc gọi. Mục tiêu thiết kế ban đầu của nhà sản
                                            xuất smartwatch sẽ là một sản phẩm công cụ hỗ trợ cho Smartphone.
                                        </p>
                                        <div class="btn-box">
                                            <a href="{{ route('client.contact') }}" class="btn1">
                                                Liên hệ ngay
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="img-box">
                                        <img src="{{ asset('storage/slider-img.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container-fluid ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="detail-box">
                                        <h1>
                                            Đồng hồ máy cơ
                                        </h1>
                                        <p>
                                            Là những chiếc đồng hồ được vận hành bằng bộ máy cơ, trong đó, bộ máy cơ
                                            được tạo ra từ những linh kiện hoàn toàn cơ khí (không chứa linh kiện điện
                                            tử), chuyển động nhờ nguồn năng lượng cơ học do dây cót sinh ra.
                                        </p>
                                        <div class="btn-box">
                                            <a href="" class="btn1">
                                                Liên hệ với chúng tôi
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="img-box">
                                        <img style="height: 410px;width:410px" src="{{ asset('storage/dhco.png') }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container-fluid ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="detail-box">
                                        <h1>
                                            Đồng hồ điện tử
                                        </h1>
                                        <p>
                                            Đồng hồ điện tử là một loại đồng hồ khác với đồng hồ cơ học, và có thể là:
                                            Đồng hồ điện: Hoạt động bằng dòng điện. Đồng hồ tinh thể thạch anh: Hoạt
                                            động qua sự dao động tinh thể của thạch anh. Đồng hồ kỹ thuật số: Đồng hồ
                                            tinh thể với chữ số.
                                        </p>
                                        <div class="btn-box">
                                            <a href="" class="btn1">
                                                Liên hệ với chúng tôi
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="img-box">
                                        <img style="height: 410px;width:410px" src="{{ asset('storage/mau.png') }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ol class="carousel-indicators">
                    <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                    <li data-target="#customCarousel1" data-slide-to="1"></li>
                    <li data-target="#customCarousel1" data-slide-to="2"></li>
                </ol>
            </div>

        </section>
        <!-- end slider section -->
    </div>

    <!-- about section -->

    <section class="client_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Khách hàng nói về chúng tôi
                </h2>
            </div>
            <div class="carousel-wrap ">
                <div class="owl-carousel client_owl-carousel">
                    <div class="item">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('storage/bat-cus.jpg') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <div class="client_info">
                                    <div class="client_name">
                                        <h5>
                                            Batman
                                        </h5>
                                        <h6>
                                            VIP Customer
                                        </h6>
                                    </div>
                                </div>
                                <p>
                                    Tôi thực sự an tâm và tin tưởng vào chất lượng dịch vụ của Provjp_Watch.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('storage/Donald_Trump.jpg') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <div class="client_info">
                                    <div class="client_name">
                                        <h5>
                                            Donald Trump
                                        </h5>
                                        <h6>
                                            Million Dollars Customer
                                        </h6>
                                    </div>
                                </div>
                                <p>
                                    Tôi thực sự an tâm và tin tưởng vào chất lượng dịch vụ của Provjp_Watch.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('storage/yasuo.jpg') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <div class="client_info">
                                    <div class="client_name">
                                        <h5>
                                            Yasuo
                                        </h5>
                                        <h6>
                                            Feeder
                                        </h6>
                                    </div>
                                </div>
                                <p>
                                    Đồng hồ cát ở đây đã cứu tôi rất nhiều lần. Cảm ơn đồng hồ của shop rất nhiều. Mãi
                                    iêu
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about_section layout_padding">
        <div class="container  ">
            <div class="row">
                <div class="col-md-6 col-lg-5 ">
                    <div class="img-box">
                        <img src="{{ asset('storage/about-img.png') }}" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-7">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                Về chúng tôi
                            </h2>
                        </div>
                        <p>
                            Được thành vào những ngày cuối cùng của năm 2001, Provjp_Watch đã tồn tại và phát triển
                            đến ngày nay và đang dần vươn lên trở thành 1 trong những chuỗi bán lẻ đồng hồ hàng đầu ở
                            Việt Nam.
                        </p>
                        <p>
                            Cùng với tiêu chí luôn đề cao những giá trị cao nhất cho khách hàng, chúng tôi không chỉ
                            mang đến những phiên bản đồng hồ chính hãng với chất lượng tốt nhất, mà còn mang lại sự an
                            tâm, tin cậy dành cho Quý khách hàng.
                        </p>
                        <a href="{{ route('client.about') }}">
                            Về Provjp_Watch
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->

    <!-- client section -->

    <section class="layout_padding">
    </section>
</x-layoutclient>
