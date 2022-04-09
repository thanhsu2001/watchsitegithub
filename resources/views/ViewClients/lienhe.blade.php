<x-layoutclient>

    <body class="sub_page">
        <section class="contact_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form_container">
                            <div class="heading_container">
                                <h2>
                                    Liên hệ cho chúng tôi
                                </h2>
                            </div>
                            <form method="post" action="{{ route('client.contact.luu') }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <x-input name="fullname" label="Tên" />
                                </div>
                                <div>
                                    <x-input type="email" name="email" placeholder="Email" label="Email" />
                                </div>
                                <div>
                                    <x-input type="phone" name="phone" placeholder="Phone number" label="Số điện thoại" />
                                </div>
                                <div>
                                    <input type="text" name="message" class="message-box" placeholder="Lời nhắn" label="Message" />
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
