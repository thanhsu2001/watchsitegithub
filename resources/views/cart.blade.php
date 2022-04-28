<x-layoutclient>
    <div class="container">
        <div class="row cart">
            <div class="col-md-8">
                <p class="text-center display-2">
                    Cart list
                </p>
                <div class="flex-1">
                    <table id="tblListCart" class="w-full text-sm lg:text-base table table-hover" cellspacing="0">
                        <thead class="thead thead-dark">
                            <tr class="h-12 uppercase">
                                <th class="hidden md:table-cell">#</th>
                                <th class="hidden md:table-cell">Picture</th>
                                <th class="text-left">Name</th>
                                <th class="pl-5 text-left lg:text-right lg:pl-0">
                                    <span class="lg:hidden" title="Quantity">Qtd</span>
                                    <span class="hidden lg:inline">Quantity</span>
                                </th>
                                <th class="hidden text-right md:table-cell"> price</th>
                                <th class="hidden text-right md:table-cell"> Total</th>
                                <th class="hidden text-right md:table-cell"> Remove </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <div>
                        Total: <span id="total"></span>
                    </div>
                    <div>
                        <form action="" method="">
                            @csrf
                            <button class="px-6 py-2 text-red-800 bg-red-300 btn btn-danger btn-remove-all mb-5" >Remove All
                                Cart</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form_container">
                    <div class="heading_container">
                        <p class="text-center display-5">
                            Thông tin đặt hàng
                        </p>
                    </div>
                    <form method="post" action="" autocomplete="off" enctype="multipart/form-data">
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
                        <textarea id="w3review" name="w3review" rows="4" cols="50">

                        </textarea>
                        <div class="d-flex mb-5">
                            <button
                                class="px-6 py-2 text-red-800 bg-red-300 btn btn-success btn-order" id="btn-order">Đặt
                                hàng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layoutclient>
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script src="{{ asset('/js/cart.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
