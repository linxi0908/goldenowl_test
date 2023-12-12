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
                $("#cart-total").html(response.total_price);
                updateCartView(response);
            },
        });
    });

    function disableAddToCartButton(button) {
        button.html(
            '<img src="https://raw.githubusercontent.com/danny-nguyen-goldenowl/webdev-intern-assignment/main/app/assets/check.png" alt="Added">'
        );
        button.off("click");
        button.attr("disabled", true);
    }

    // $(".icon_close").on("click", function () {
    //     var url = $(this).data("url");
    //     var productId = $(this).data("id");
    //     $.ajax({
    //         method: "GET",
    //         url: url,
    //         data: {
    //             _token: "{{ csrf_token() }}",
    //         },
    //         success: function (response) {
    //             if (response.success) {
    //                 var cartData = localStorage.getItem("cart");
    //                 var cartItems = cartData ? JSON.parse(cartData) : [];
    //                 if (cartItems.hasOwnProperty(productId)) {
    //                     delete cartItems[productId];
    //                     localStorage.setItem("cart", JSON.stringify(cartItems));
    //                     $("#cart-total").html(response.total_price);
    //                 }
    //                 $("#" + productId).empty();
    //             }
    //         },
    //     });
    // });
    $(".icon_close").on("click", function () {
        var productId = $(this).data("id");

        var cartData = localStorage.getItem("cart");
        var cartItems = cartData ? JSON.parse(cartData) : {};
        if (cartItems.hasOwnProperty(productId)) {
            console.log(cartItems[productId]);
            delete cartItems[productId];
            localStorage.setItem("cart", JSON.stringify(cartItems));
        }
        $("#" + productId).empty();
    });

    function updateCartView(response) {
        var cardCart = $("#card-cart");
        cardCart.empty();

        if (Object.keys(response.cart).length > 0) {
            Object.entries(response.cart).forEach(function ([productId, item]) {
                var cartItem = $("<div>")
                    .attr("id", productId)
                    .addClass("cart");
                var cartLeft = $("<div>").addClass("cart-left");
                var cartImg = $("<div>")
                    .addClass("cart-img")
                    .css("background", item.color);
                var img = $("<img>")
                    .attr("src", item.image)
                    .attr("alt", item.name);
                cartImg.append(img);
                cartLeft.append(cartImg);
                cartItem.append(cartLeft);

                var cartRight = $("<div>").addClass("cart-right");
                var cartItemName = $("<div>").addClass("cartItemName");
                var h5 = $("<h5>").text(item.name);
                cartItemName.append(h5);
                cartRight.append(cartItemName);

                var cartItemPrice = $("<div>").addClass("cartItemPrice");
                var h4 = $("<h4>").text("$ " + item.price);
                cartItemPrice.append(h4);
                cartRight.append(cartItemPrice);

                var cartItemAction = $("<div>").addClass("cartItemAction");
                var cartItemCount = $("<div>").addClass("cartItemCount");
                var cartItemCountMinus =
                    $("<div>").addClass("cartItemCountMinus");
                var minusImg = $("<img>")
                    .attr(
                        "src",
                        "https://raw.githubusercontent.com/danny-nguyen-goldenowl/webdev-intern-assignment/main/app/assets/minus.png"
                    )
                    .attr("alt", "");
                cartItemCountMinus.append(minusImg);
                cartItemCount.append(cartItemCountMinus);

                var cartItemCountNumber = $("<div>").addClass(
                    "cartItemCountNumber"
                );
                var input = $("<input>")
                    .attr("type", "text")
                    .val(item.qty)
                    .attr("name", "qtybutton")
                    .addClass("cart-plus-minus-box")
                    .prop("disabled", true);
                cartItemCountNumber.append(input);
                cartItemCount.append(cartItemCountNumber);

                var cartItemCountPlus =
                    $("<div>").addClass("cartItemCountPlus");
                var plusImg = $("<img>")
                    .attr(
                        "src",
                        "https://raw.githubusercontent.com/danny-nguyen-goldenowl/webdev-intern-assignment/main/app/assets/plus.png"
                    )
                    .attr("alt", "");
                cartItemCountPlus.append(plusImg);
                cartItemCount.append(cartItemCountPlus);
                cartItemAction.append(cartItemCount);

                var cartItemRemove = $("<div>").addClass("cartItemRemove");
                var span = $("<span>")
                    .addClass("icon_close")
                    .attr("data-id", productId);
                var trashImg = $("<img>")
                    .attr(
                        "src",
                        "https://raw.githubusercontent.com/danny-nguyen-goldenowl/webdev-intern-assignment/main/app/assets/trash.png"
                    )
                    .attr("alt", "");
                span.append(trashImg);
                cartItemRemove.append(span);
                cartItemAction.append(cartItemRemove);

                cartRight.append(cartItemAction);
                cartItem.append(cartRight);

                cardCart.append(cartItem);
            });
        } else {
            cardCart.html("<p>Your cart is empty.</p>");
        }
    }


});

function calculateTotalPrice() {
    var cartData = localStorage.getItem("cart");
    var cartItems = cartData ? JSON.parse(cartData) : {};
    var totalPrice = 0;

    for (var productId in cartItems) {
        if (cartItems.hasOwnProperty(productId)) {
            var product = cartItems[productId];
            var qty = product.qty;
            var price = product.price;

            totalPrice += qty * price;
        }
    }

    return totalPrice;
}
var total = calculateTotalPrice();
console.log(total);
