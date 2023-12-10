$(document).ready(function () {
    var cartData = localStorage.getItem("cart");
    var cartItems = cartData ? JSON.parse(cartData) : [];

    $(".add-to-cart").each(function () {
        var productId = $(this).data("product-id");

        if ($.inArray(productId, cartItems) !== -1) {
            disableAddToCartButton($(this));
        }
    });

    $(".add-to-cart").on("click", function (event) {
        event.preventDefault();
        var url = $(this).data("url");
        var addButton = $(this);
        var productId = $(this).data("product-id");

        if ($.inArray(productId, cartItems) !== -1) {
            return;
        }

        $.ajax({
            method: "get",
            url: url,
            data: {
                cart: localStorage.getItem("cart"),
            },
            success: function (response) {
                localStorage.setItem("cart", JSON.stringify(response.cart));
                disableAddToCartButton(addButton);
                $("#cart-total").html(number_format(response.total_price, 2));
            },
        });
    });

    function disableAddToCartButton(button) {
        button.html(
            '<img src="https://raw.githubusercontent.com/danny-nguyen-goldenowl/webdev-intern-assignment/main/app/assets/check.png" alt="Added">'
        );
        button.prop("disabled", true);
    }

    $(".icon_close").on("click", function () {
        var url = $(this).data("url");
        var productId = $(this).data("id");
        $.ajax({
            method: "GET",
            url: url,
            data: {
                _token: "{{ csrf_token() }}",
            },
            success: function (response) {
                if (response.success) {
                    var cartData = localStorage.getItem("cart");
                    var cartItems = cartData ? JSON.parse(cartData) : [];
                    if (cartItems.hasOwnProperty(productId)) {
                        delete cartItems[productId];
                        localStorage.setItem("cart", JSON.stringify(cartItems));
                        $("#cart-total").html(
                            formatNumber(response.total_price)
                        );
                    }
                    $("#" + productId).empty();
                }
            },
        });
    });
});
