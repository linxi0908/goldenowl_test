<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Golden Sneaker</title>

    
    <link rel="shortcut icon" href="https://raw.githubusercontent.com/danny-nguyen-goldenowl/webdev-intern-assignment/main/app/assets/favicon.ico" type="image/x-icon" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?> ">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-content">
                        <img src="https://raw.githubusercontent.com/danny-nguyen-goldenowl/webdev-intern-assignment/main/app/assets/nike.png" alt="nike">
                        <div class="card-header">
                            <h3>Our Products</h3>
                        </div>
                        <div class="card-container">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card-product">
                                <div class="product-img" style="background: <?php echo e($product->color); ?>;">
                                    <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>">
                                </div>
                                <div class="product-name">
                                    <h4><?php echo e($product->name); ?></h4>
                                </div>
                                <div class="product-description">
                                    <p><?php echo e($product->description); ?></p>
                                </div>
                                <div class="product-price">
                                    <h4>$ <?php echo e(number_format($product->price,2)); ?></h4>
                                    <p><a href="#" class="add-to-cart" data-product-id="<?php echo e($product->id); ?>" data-url="<?php echo e(route('add_to_cart', ['productId' => $product->id])); ?>">add to cart</a></p>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-content">
                        <img src="https://raw.githubusercontent.com/danny-nguyen-goldenowl/webdev-intern-assignment/main/app/assets/nike.png" alt="nike">
                        <div class="card-header">
                            <h3>Your cart</h3>
                            <?php $total_price = 0 ?>
                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $total_price += $item['qty'] * $item['price'] ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <h3 id="cart-total">$ <?php echo e(number_format( $total_price, 2)); ?></h3>
                        </div>
                        <div class="card-cart">
                            <?php if(!empty($cart)): ?>
                            <?php $total = 0 ?>
                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productId => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $total += $item['qty'] * $item['price'] ?>
                            <div id="<?php echo e($productId); ?>">
                                <div id="cart" class="cart">
                                    <div class="cart-left">
                                        <div class="cart-img" style="background: <?php echo e($item['color']); ?>;">
                                            <img src="<?php echo e($item['image']); ?>" alt="<?php echo e($item['name']); ?>">
                                        </div>
                                    </div>
                                    <div class="cart-right">
                                        <div class="cartItemName">
                                            <h5><?php echo e($item['name']); ?></h5>
                                        </div>
                                        <div class="cartItemPrice">
                                            <h4>$ <?php echo e(number_format( $item['qty'] * $item['price'], 2)); ?></h4>
                                        </div>
                                        <div class="cartItemAction">
                                            <div class="cartItemCount"
                                            data-price="<?php echo e($item['price']); ?>"
                                            data-url="<?php echo e(route('update_item_in_cart', ['productId' => $productId])); ?>"
                                            data-id="<?php echo e($productId); ?>">
                                                <div class="cartItemCountMinus">
                                                    <img src="https://raw.githubusercontent.com/danny-nguyen-goldenowl/webdev-intern-assignment/main/app/assets/minus.png" alt="">
                                                </div>
                                                <div class="cartItemCountNumber">
                                                    <input type="text" value="<?php echo e($item['qty']); ?>" name="qtybutton" class="cart-plus-minus-box" disabled>
                                                </div>
                                                <div class="cartItemCountPlus">
                                                    <img src="https://raw.githubusercontent.com/danny-nguyen-goldenowl/webdev-intern-assignment/main/app/assets/plus.png" alt="">
                                                </div>
                                            </div>
                                            <div class="cartItemRemove">
                                                <span class="icon_close" data-id="<?php echo e($productId); ?>" data-url="<?php echo e(route('delete_item_in_cart', ['productId' => $productId])); ?>">
                                                    <img src="https://raw.githubusercontent.com/danny-nguyen-goldenowl/webdev-intern-assignment/main/app/assets/trash.png" alt="">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <p>Your cart is empty.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            var cartData = localStorage.getItem('cart');
            var cartItems = cartData ? JSON.parse(cartData) : [];

            $('.add-to-cart').each(function() {
                var productId = $(this).data('product-id');

                if ($.inArray(productId, cartItems) !== -1) {
                    disableAddToCartButton($(this));
                }
            });

            $('.add-to-cart').on('click', function(event) {
                event.preventDefault();
                var url = $(this).data('url');
                var addButton = $(this);
                var productId = $(this).data('product-id');

                if ($.inArray(productId, cartItems) !== -1) {
                    return;
                }

                $.ajax({
                    method: 'get'
                    , url: url
                    , data: {
                        cart: localStorage.getItem('cart')
                    }
                    , success: function(response) {
                        localStorage.setItem('cart', JSON.stringify(response.cart));
                        disableAddToCartButton(addButton);
                        $('#cart-total').html(number_format(response.total_price,2));
                    }
                , });
            });

            function disableAddToCartButton(button) {
                button.html('<img src="https://raw.githubusercontent.com/danny-nguyen-goldenowl/webdev-intern-assignment/main/app/assets/check.png" alt="Added">');
                button.prop('disabled', true);
            }

            $('.icon_close').on('click', function() {
                var url = $(this).data('url');
                var productId = $(this).data('id');
                $.ajax({
                    method: 'GET'
                    , url: url
                    , data: {
                        '_token': '<?php echo e(csrf_token()); ?>'
                    }
                    , success: function(response) {
                        if (response.success) {
                            var cartData = localStorage.getItem('cart');
                            var cartItems = cartData ? JSON.parse(cartData) : [];
                            if (cartItems.hasOwnProperty(productId)) {
                                delete cartItems[productId];
                                localStorage.setItem('cart', JSON.stringify(cartItems));
                                $('#cart-total').html(formatNumber(response.total_price));
                            }
                            $('#' + productId).empty();
                        }

                    }
                });
            });

            $('.cartCountMinus').on('click', function() {
            var button = $(this);
            var id = button.parent().data('id');
            var qtyInput = button.siblings('.cart-plus-minus-box');
            var qty = parseInt(qtyInput.val());
            var url = button.parent().data('url');
            var price = parseFloat(button.parent().data('price'));

            if (button.hasClass('inc')) {
                qty + 1;
            } else {
                (qty < 0) ? 0 : (qty - 1);
            }

            qtyInput.val(qty);

            var totalPrice = price * qty;

            url += '/' + qty;
            $.ajax({
                method: 'GET',
                url: url,

                success: function(response) {
                    if (qty === 0) {
                        $('#' + id).empty();
                    }

                    }
                });
            });

            function formatNumber(number) {
            return number.toLocaleString('en-US');
            }
        });

    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\goldenowl_test\resources\views/home.blade.php ENDPATH**/ ?>