$("#btn-addtocart").click(function (ev) {
    var id = $(ev.target).data("id");
    var soLuong = Number($("#quantity").val());
    var cartData = localStorage.getItem("cart");
    cartData = JSON.parse(cartData); // mảng

    // [{
    //     id: x,
    //     quantity: y
    // }];

    if (cartData) {
        // check sản phẩm có trong giỏ hay chưa
        var idx = cartData.findIndex(item => item.id == id);
        if (idx == -1) { // chưa có trong giỏ
            cartData.push({
                id: id,
                quantity: soLuong
            });
        } else {
            // đã có thì tăng số lượng
            cartData[idx.toString()].quantity += soLuong;
        }
    } else {
        cartData = [];
        cartData.push({
            id: id,
            quantity: soLuong
        });
    }
    localStorage.setItem("cart", JSON.stringify(cartData));
});

// lấy dữ liệu
$(function () {
    var tblListCart = $("#tblListCart");
    var isListCart = tblListCart.length;
    var cartData = JSON.parse(localStorage.getItem("cart"));

    if (!cartData || !isListCart) return;

    var ids = cartData.map(item => item.id);
    var tbodyEle = tblListCart.find("tbody");

    $.get("/api/getsanpham/" + ids.join(','), function (response) {
        response.forEach((item, idx) => {
            var eleIdx = cartData.findIndex(i => i.id == item.id);
            if (eleIdx == -1) return;
            var trEle = $(`
        <tr>
            <td>
                
            </td>
            <td class="hidden pb-4 md:table-cell">
                <a href="/client/${item.id}/chi-tiet-sp">
                    <img class="w-20 rounded" alt="Thumbnail" width="100" src="/storage/${item.hinhanh}">
                </a>
            </td>
            <td>
                <a style="text-decoration: none" href="/client/${item.id}/chi-tiet-sp"><p class="mb-2 md:ml-4">${item.tensanpham}</p></a>
            </td>
            <td class="justify-center mt-6 md:justify-end md:flex">
                <div class="h-10 w-28">
                    <div class="relative flex flex-row w-full h-8">
                        <input type="hidden" data-id="${cartData[eleIdx].id}" value="${item.gia.split(".")[0]}" />
                        <input type="number" min="1" class="w-6 text-center bg-gray-300 js-quantity" value="${cartData[eleIdx].quantity}" />
                    </div>
                </div>
            </td>
            <td class="hidden text-right md:table-cell">
                <span class="text-sm font-medium lg:text-base">${numberWithCommas(item.gia.split(".")[0])} vnđ</span>
            </td>
            <td>
                <span class="text-sm font-medium lg:text-base totalPrice-${item.id}">${numberWithCommas(item.gia.split(".")[0]*cartData[eleIdx].quantity)} vnđ</span>
            </td>
            <td class="hidden text-right md:table-cell">
                <button class="btn-removecart btn btn-danger" data-id="${item.id}">x</button>
            </td>
        </tr>
            `);
            tbodyEle.append(trEle);
        });
        // Cập nhật giá tổng
        var total = getTotal(cartData);
        $("#total").text(numberWithCommas(total));
    });
});

$(document).on("click", ".btn-removecart", function (ev) {
    var id = $(ev.target).data("id");
    var cartData = JSON.parse(localStorage.getItem("cart"));
    var idx = cartData.findIndex(i => i.id == id);
    if (idx != -1) {
        cartData.splice(idx, 1);
    }
    var total = getTotal(cartData);
    $("#total").text(numberWithCommas(total));
    localStorage.setItem("cart", JSON.stringify(cartData));
    $(ev.target).closest("tr").remove();
});
$(document).on("click", ".btn-remove-all", function (ev) {
    localStorage.clear();
});

$(document).on("change", function (ev) {
    var cartData = JSON.parse(localStorage.getItem("cart"));
    var id = $(ev.target).prev().attr("data-id");
    var idx = cartData.findIndex(i => i.id == id);
    if (idx != -1) {
        var hiddenEle = $(`input[data-id=${cartData[idx].id}]`);
        cartData[idx].quantity = Number($(ev.target).val());
        $(`.totalPrice-${cartData[idx].id}`).text(`${numberWithCommas(Number(hiddenEle.val()) * cartData[idx].quantity)} vnđ`);
    }
    // Cập nhật giá tổng
    var total = getTotal(cartData);
    localStorage.setItem("cart", JSON.stringify(cartData));
    
    $("#total").text(numberWithCommas(total));
});

function getTotal(cartData = []) {
    console.log(cartData)
    var total = 0;
    cartData.forEach((item, idx) => {
        var hiddenEle = $(`input[data-id=${item.id}]`);
        var price = Number(hiddenEle.val());
        total += price * item.quantity;
    });
    return total;
}
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// Nút đạt hàng
$("#btn-order").click(function(ev){
    var cartData = localStorage.getItem("cart");
    $.ajax({
        // Tiến sẽ làm
    });
});

$(document).ready(function(){
    var cartData = localStorage.getItem("cart");
    if(cartData === null) {
        $(".cart").html(`<h1 class="text-center display-2 mb-5"  style="height:300px" >Giỏ hàng trống</h1>`)
    }
});