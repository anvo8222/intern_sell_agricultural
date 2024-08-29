$(document).ready(function () {
    $(".add-cart").click(function (e) {
        e.preventDefault();
        let error = false;
        const productId = $(".product_id-hidden").val();
        const quantity = parseInt($(".quantity").val());
        const stock = parseInt($(".product_stock-hidden").val());
        if (quantity > stock) {
            error = true;
            alert("Số lượng phải nhỏ hơn kho!");
        }
        if (quantity < 1) {
            error = true;
            alert("Số lượng phải tối thiểu là 1!");
        }
        if (!error) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                url: "/add_cart",
                type: "post",
                dataType: "JSON",
                data: {
                    productId: productId,
                    quantity: quantity,
                },
                success: function (response) {
                    $(".quantity_cart").text("(" + response.quantityCart + ")");
                    swal("Bạn đã thêm sản phẩm vào giỏ thành công!", {
                        icon: "success",
                    });
                },
                statusCode: {
                    404: function () {
                        alert("web not found");
                    },
                },
                error: function (x, xs, xt) {},
            });
        }
    });
});
