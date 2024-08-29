$(document).ready(function () {
    $(".cart_quantity_up").click(function (e) {
        e.preventDefault();
        const idProduct = Number(
            $(this).closest(".item_cart").find(".idProductHidden").val()
        );
        const quantityProduct =
            Number(
                $(this).closest(".cart_quantity_button").find("input").val()
            ) + 1;
        let $t = $(this);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/cart/quantity_up",
            type: "post",
            dataType: "JSON",
            data: {
                idProduct: idProduct,
            },
            success: function (response) {
                if (response.status_error) {
                    swal("Lỗi!", response.error, "warning");
                } else {
                    console.log(response.totalPriceAllCart);
                    $t.closest(".cart_quantity_button")
                        .find("input")
                        .val(response.quantity);
                    $t.closest(".item_cart")
                        .find(".cart_total_price")
                        .text(
                            response.priceItem
                                .toLocaleString("it-IT", {
                                    style: "currency",
                                    currency: "VND",
                                })
                                .split("VND")[0]
                        );
                    $(".total_price-all")
                        .find("span")
                        .text(
                            response.totalPriceAllCart.toLocaleString("it-IT", {
                                style: "currency",
                                currency: "VND",
                            })
                        );
                    $(".quantity_cart").text("(" + response.quantityCart + ")");
                }
            },
        });
    });
    // quantitydown
    $(".cart_quantity_down").click(function (e) {
        e.preventDefault();
        const $t = $(this);
        const idProduct = Number(
            $(this).closest(".item_cart").find(".idProductHidden").val()
        );
        //get quantity item in cart
        const quantityProduct = Number(
            $(this)
                .closest(".item_cart")
                .find(".cart_quantity_button")
                .find("input")
                .val()
        );
        console.log(quantityProduct);
        if (quantityProduct == 1) {
            swal({
                title: "Cảnh báo!",
                text: "Bạn có muốn xoá sản phẩm này?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                    });
                    $.ajax({
                        url: "/cart/deleteItem",
                        type: "post",
                        dataType: "JSON",
                        data: {
                            idProduct: idProduct,
                        },
                        success: function (response) {
                            console.log("cart:", response.cart);
                            if (response.deleted == true) {
                                $t.closest(".item_cart").remove();
                            }
                            // $('.cart_quantity').find('span').text('Cart ' + result
                            //     .quantity)
                            $(".total_price-all")
                                .find("span")
                                .text(
                                    response.totalPriceAllCart.toLocaleString(
                                        "it-IT",
                                        {
                                            style: "currency",
                                            currency: "VND",
                                        }
                                    )
                                );
                            $(".quantity_cart").text(
                                "(" + response.quantityCart + ")"
                            );

                            swal(
                                "Poof! Your imaginary file has been deleted!",
                                {
                                    icon: "success",
                                    text: idProduct,
                                }
                            );
                        },
                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
            });
        } else {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                url: "/cart/quantity_down",
                type: "post",
                dataType: "JSON",
                data: {
                    idProduct: idProduct,
                },
                success: function (response) {
                    $t.closest(".cart_quantity_button")
                        .find("input")
                        .val(response.quantity);
                    $t.closest(".item_cart")
                        .find(".cart_total_price")
                        .text(
                            response.priceItem
                                .toLocaleString("it-IT", {
                                    style: "currency",
                                    currency: "VND",
                                })
                                .split("VND")[0]
                        );
                    $(".total_price-all")
                        .find("span")
                        .text(
                            response.totalPriceAllCart.toLocaleString("it-IT", {
                                style: "currency",
                                currency: "VND",
                            })
                        );
                    $(".quantity_cart").text("(" + response.quantityCart + ")");
                },
            });
        }
    });
    // delete
    $(".cart_quantity_delete").click(function (e) {
        const $t = $(this);
        swal({
            title: "Cảnh báo!",
            text: "Bạn có muốn xoá sản phẩm này?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            const idProduct = Number(
                $(this).closest(".item_cart").find(".idProductHidden").val()
            );

            if (willDelete) {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    url: "/cart/deleteItem",
                    type: "post",
                    dataType: "JSON",
                    data: {
                        idProduct: idProduct,
                    },
                    success: function (response) {
                        console.log("cart:", response.cart);
                        if (response.deleted == true) {
                            $t.closest(".item_cart").remove();
                        }
                        $(".total_price-all")
                            .find("span")
                            .text(
                                response.totalPriceAllCart.toLocaleString(
                                    "it-IT",
                                    {
                                        style: "currency",
                                        currency: "VND",
                                    }
                                )
                            );
                        $(".quantity_cart").text(
                            "(" + response.quantityCart + ")"
                        );
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                            text: idProduct,
                        });
                    },
                });
            } else {
                swal("Bạn đã huỷ lệnh thành công!");
            }
        });
    });
});
