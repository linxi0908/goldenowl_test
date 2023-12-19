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
    <div id="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-content">
                        <img src="https://raw.githubusercontent.com/danny-nguyen-goldenowl/webdev-intern-assignment/main/app/assets/nike.png" alt="nike">
                        <div class="card-header">
                            <h3>Our Products</h3>
                        </div>
                        <div id="card-container">
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
                            <div id="cart-total"></div>
                        </div>
                        <div id="card-cart"></div>
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
    <script type="module" src="{{ asset('js/app.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
