<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Golden Sneaker</title>

    {{-- Short-icon --}}
    <link rel="shortcut icon" href="https://raw.githubusercontent.com/danny-nguyen-goldenowl/webdev-intern-assignment/main/app/assets/favicon.ico" type="image/x-icon" />
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    {{-- Bootstrap lib --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- Style --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}} ">
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
                            @foreach ($products as $product)
                            <div class="card-product">
                                <div class="product-img" style="background: {{ $product->color }};">
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}">
                                </div>
                                <div class="product-name">
                                    <h4>{{ $product->name }}</h4>
                                </div>
                                <div class="product-description">
                                    <p>{{ $product->description }}</p>
                                </div>
                                <div class="product-price">
                                    <h4>$ {{ number_format($product->price,2) }}</h4>
                                    <p><a href="#" class="add-to-cart" data-product-id="{{ $product->id }}" data-url="{{ route('add_to_cart', ['productId' => $product->id]) }}">add to cart</a></p>
                                </div>
                            </div>
                            @endforeach
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
                            <h3 id="cart-total">$ 0.00</h3>
                        </div>
                        <div id="card-cart">
                            <div id="">
                                <div id="cart" class="cart">
                                    <div class="cart-left">
                                        <div class="cart-img" style="background: ;">
                                            <img src="" alt="">
                                        </div>
                                    </div>
                                    <div class="cart-right">
                                        <div class="cartItemName">
                                            <h5></h5>
                                        </div>
                                        <div class="cartItemPrice">
                                            <h4></h4>
                                        </div>
                                        {{-- <div class="cartItemAction">
                                            <div class="cartItemCount"
                                            data-price=""
                                            data-url=""
                                            data-id="">
                                                <div class="cartItemCountMinus">
                                                    <img src="https://raw.githubusercontent.com/danny-nguyen-goldenowl/webdev-intern-assignment/main/app/assets/minus.png" alt="">
                                                </div>
                                                <div class="cartItemCountNumber">
                                                    <input type="text" value="" name="qtybutton" class="cart-plus-minus-box" disabled>
                                                </div>
                                                <div class="cartItemCountPlus">
                                                    <img src="https://raw.githubusercontent.com/danny-nguyen-goldenowl/webdev-intern-assignment/main/app/assets/plus.png" alt="">
                                                </div>
                                            </div>
                                            <div class="cartItemRemove">
                                                <span class="icon_close" data-id="" data-url="">
                                                    <img src="https://raw.githubusercontent.com/danny-nguyen-goldenowl/webdev-intern-assignment/main/app/assets/trash.png" alt="">
                                                </span>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- JS --}}
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
