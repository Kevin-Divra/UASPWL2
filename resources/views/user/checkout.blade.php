<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icon-css/css/flag-icon.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="website icon" type="png" href="https://tse2.mm.bing.net/th?id=OIP.Z306v3XdxhOaxBFGfHku7wHaHw&pid=Api&P=0&h=180">
    <!--Feather Icon-->
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <style>
        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.2rem 7%;
            background-color: white;
            color: black;
            border-bottom: 2px solid var(--green);
            left: 0;
            right: 0;
            z-index: 9999;
        }
        .navbar .navbar-logo {
            font-size: 2rem;
            font-weight: 700;
            color: var(--green);
            font-style: italic;
        }
        .navbar .navbar-logo span {
            color: greenyellow;
        }
        .navbar .navber a {
            color: var(--green);
            display: inline-block;
            margin: 0px 1rem;
            font-size: 1.2rem;
            text-decoration: none;
        }
        .navbar .navber a:hover {
            color: green;
            text-decoration: none;
            border-bottom: 0.1rem solid var(--green);
        }
        .navbar .navber a:active, a:focus{
            border-bottom: 0.1rem solid var(--green);
        }
        .navbar .navber a::after {
            content: '';
            color: white;
            padding-bottom: 0.5rem;
            border-bottom: 0.1rem solid var(--green);
            transform: scaleX(0);
            transition: 0.2s linear;
        }
        .navbar .navber a:hover::after {
            transform: scaleX(0.5);
        }
        .navber button {
            background: transparent;
            border: 1px solid var(--green);
            color: var(--green);
            width: 50px;
        }
        #ikonnav {
            margin: 0px 1rem;
            color: inherit;
        }
        #ikonnav:hover{
            color: red;

        }

        .checkout-title {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: left;
        }
        .checkout-steps {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            gap: 10px;
            justify-content: start;
            text-align: left;
        }
        .checkout-steps span {
            color: #6c757d;
            font-weight: bold;
            font-size: 1.2rem;
        }
        .checkout-steps span.active {
            color: #000;
        }

        .arrow {
            display: inline-block;
            width: 40px;
            height: 2px;
            background: #ccc;
            position: relative;
        }
        .arrow::before {
            content: '';
            width: 0;
            height: 0;
            border-left: 8px solid #ccc;
            border-top: 4px solid transparent;
            border-bottom: 4px solid transparent;
            position: absolute;
            right: -10px;
            top: -3px;
        }

        .payment-details {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .btn-pay {
            border: 1px solid #aaa; /* Light gray thin border */
            border-radius: 8px; /* Smooth rounded corners */
            background-color: white; /* Optional: Background color */
        }
        .btn-pay:hover {
            background-color: #000;
            color: #fff;
        }
        .btn-option {
            width: 50%;
            text-align: center;
            padding: 10px;
        }
        .btn-option.active {
            background-color: #000;
            color: white;
        }

        .toggle-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        .toggle-label {
            font-size: 16px;
            color: #333;
        }
        .toggle-switch {
            position: relative;
            width: 40px;
            height: 20px;
        }
        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .slider {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            border-radius: 20px;
            cursor: pointer;
            transition: 0.4s;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 14px;
            width: 14px;
            background-color: white;
            border-radius: 50%;
            bottom: 3px;
            left: 3px;
            transition: 0.4s;
        }
        input:checked + .slider {
            background-color: #28a745;
        }
        input:checked + .slider:before {
            transform: translateX(20px);
        }

        .timer-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .timer {
            font-weight: bold;
        }
        .instructions {
            font-size: 0.9rem;
            color: #555;
            margin-top: 30px;
        }
        .instructions li {
            margin-bottom: 8px;
        }
        .masa-berlaku {
            margin: 25px;
        }
        .qris-img {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
        }
        .payment-status {
            border: 1px solid #aaa;
            border-radius: 8px;
            width: 700px;
            height: 35px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">ALLBIRDS</a>
        <div class="navber">
         <a href="#awal">Handphone</a>
         <a href="./Photo/poto.html">Laptop</a>
         <a href="./Login form tt/logins.html">TV</a>
        </div>
        <div class="navbar-extra">
         <a href="#" id="ikonnav"> <i data-feather="search"></i></a>
         <a href="#" id="ikonnav"> <i data-feather="user"></i></a>
         <a href="#" id="ikonnav"> <i data-feather="shopping-cart"></i></a>
        </div>
    </nav>

    <div class="container my-5">
        <!-- Checkout Title -->
        <div class="checkout-title">Checkout</div>

        <!-- Checkout Steps -->
        <div class="checkout-steps">
            <span class="active">Payment</span>
        </div>

        <div class="row">
            <!-- Payment Form -->
            <div class="col-md-7">
                <div class="payment-details">
                    <h4>Payment Details</h4>
                    <div class="d-flex gap-3 mb-3">
                        <button id="qris-btn" class="btn btn-outline-dark w-50">QRIS</button>
                        <button id="creditcard-btn" class="btn btn-outline-dark w-50 active">Rekening</button>
                    </div>
                    <div id="qris-form" style="display: none;">
                    <h5 class="masa-berlaku">Bayar Sebelum 18 Des 2024, 21:35 WIB</h5>
                    <div class="timer-container">
                        <p>QRIS berlaku sampai <span class="timer" id="timer">90</span> <span class="timer">detik</span></p>
                    </div>
                    <div class="qris-img">
                    <img src="https://imgs.search.brave.com/UXR7_Rm8iOdYgNQjdzPX6bS5vN04wGMmPd-L8uAdhpI/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9yYW5k/b21xci5jb20vYXNz/ZXRzL2ltYWdlcy9y/aWNrcm9sbC1xcmNv/ZGUud2VicA" alt="QRIS" >
                    </div>
                    <div></div>
                    <ul class="instructions">
                        <li>Download atau screenshot QRIS.</li>
                        <li>Buka aplikasi bank atau e-wallet yang mendukung pembayaran QRIS di HP-mu.</li>
                        <li>Scan atau upload QR code di atas.</li>
                    </ul>
                    </div>
                    <div id="credit-card-form">
                        <form>
                            <div class="mb-3">
                                <label for="cardName" class="form-label">Cardholder Name</label>
                                <input type="text" class="form-control" id="cardName" placeholder="ALLBIRDS">
                            </div>
                            <div class="mb-3">
                                <label for="cardNumber" class="form-label">Card Number</label>
                                <input type="password" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456">
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="expiryMonth" class="form-label">Month</label>
                                    <input type="password" class="form-control" id="expiryMonth" placeholder="MM">
                                </div>
                                <div class="col">
                                    <label for="expiryYear" class="form-label">Year</label>
                                    <input type="password" class="form-control" id="expiryYear" placeholder="YY">
                                </div>
                                <div class="col">
                                    <label for="cvc" class="form-label">CVC</label>
                                    <input type="password" class="form-control" id="cvc" placeholder="CVC">
                                </div>
                            </div>
                            <div class="toggle-container">
                            <label for="saveCardToggle" class="toggle-label">Save card data for future payments</label>
                            <label class="toggle-switch">
                                <input type="checkbox" id="saveCardToggle">
                                <span class="slider"></span>
                            </label>
                            </div>
                            <button type="submit" class="btn btn-pay w-100">Pay with card</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="col-md-5">
                <div class="cart-summary">
                    <h4>Your Cart</h4>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <img src="" alt="foto" width="" height="">
                            <p class="mb-0">Men's winter jacket</p>
                            <small>Size: L, Quantity: 1</small>
                        </div>
                        <p>$99</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <img src="" alt="foto" width="" height="">
                            <p class="mb-0">Men's winter jacket</p>
                            <small>Size: L, Quantity: 1</small>
                        </div>
                        <p>$99</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    // Toggle payment methods
    const qrisBtn = document.getElementById('qris-btn');
    const creditCardBtn = document.getElementById('creditcard-btn');
    const qrisForm = document.getElementById('qris-form');
    const creditCardForm = document.getElementById('credit-card-form');

    qrisBtn.addEventListener('click', () => {
        qrisBtn.classList.add('active');
        creditCardBtn.classList.remove('active');
        qrisForm.style.display = 'block';
        creditCardForm.style.display = 'none';
    });

    creditCardBtn.addEventListener('click', () => {
        creditCardBtn.classList.add('active');
        qrisBtn.classList.remove('active');
        qrisForm.style.display = 'none';
        creditCardForm.style.display = 'block';
    });

    let timerElement = document.getElementById("timer");
    let time = 90;

    function startTimer() {
      setInterval(() => {
        timerElement.textContent = time;
        time--;

        if (time < 0) {
          time = 90;
        }
      }, 1000);
    }

    window.onload = startTimer;
</script>
</body>
</html>