<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Styling untuk top-banner */
        .top-banner {
            background-color: #977450; /* Warna coklat muda */
            color: white;
            text-align: center;
            padding: 10px 0;
            font-size: 14px;
        }

        /* Styling umum untuk link dan hover */
        a {
            text-decoration: none;
            color: #333; /* Warna teks default */
            transition: color 0.3s ease, transform 0.3s ease; /* Animasi untuk warna dan transformasi */
        }

        a:hover {
            color: #977450; /* Warna teks saat hover */
            transform: scale(1.05); /* Membesar sedikit saat hover */
        }

        /* Header Styling */
        .header-area {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Memberikan bayangan lembut */
            border-bottom: 2px solid #eee; /* Garis bawah halus */
            background-color: white;
        }

        .header-area .navigation-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 20px; /* Memberikan jarak antar item menu */
        }

        .header-area .navigation-menu ul li {
            display: inline-block;
            font-size: 16px; /* Ukuran font */
            font-weight: bold;
        }

        .header-cart i {
            font-size: 18px;
            color: #333;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .header-cart i:hover {
            color: #977450;
            transform: rotate(-20deg) scale(1.2); /* Animasi ikon keranjang */
        }

        /* Efek hover untuk tombol */
        .btn {
            display: inline-block;
            text-align: center;
            padding: 10px 20px;
            background-color: #977450; /* Warna tombol */
            color: white;
            border: none;
            border-radius: 5px; /* Sudut tombol melengkung */
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn:hover {
            background-color: #755a37; /* Warna tombol saat hover */
            transform: translateY(-2px); /* Tombol sedikit naik saat hover */
        }

        /* Styling untuk modal */
        .modal-content {
            border-radius: 10px; /* Sudut modal melengkung */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Bayangan pada modal */
        }

        .modal-box-wrapper {
            padding: 20px;
        }

        .single-input input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        .single-input input:focus {
            border-color: #977450; /* Border berubah warna saat fokus */
            outline: none;
        }

        .tab__item .nav-link {
            color: #333;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .tab__item .nav-link.active {
            background-color: #977450; /* Warna aktif */
            color: white;
        }

        .tab__item .nav-link:hover {
            background-color: #755a37;
            color: white;
        }
    </style>
</head>
<body>
    <div class="top-banner">
        Shop Smart, Shop Fast, Shop Us
    </div>

    <div class="header-area header-area--default bg-white">
        <header class="header-area header-sticky">
            <div class="container-fluid container-fluid--cp-100">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-6">
                        <div class="header-right-items content__hidden d-none d-md-block">
                            <small class="text-color-primary"><b>GGStore</b></small>
                        </div>
                        <div class="logo__hidden text-start">
                            <small class="text-color-primary"><b>GGStore</b></small>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="header__navigation">
                            <nav class="navigation-menu">
                                <ul class="justify-content-center">
                                    <li><a href="{{route('user.home')}}"><span>Home</span></a></li>
                                    <li><a href="{{route('user.shop')}}"><span>Shop</span></a></li>
                                    <li><a href="{{route('user.profile')}}"><span>Profile</span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="header-right-side text-end">
                            <div class="header-right-items">
                                <a href="{{route('user.cart')}}" class="header-cart">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <div class="header-login-register-wrapper modal fade" id="authModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-box-wrapper">
                    <div class="helendo-tabs">
                        <ul class="nav" role="tablist">
                            <li class="tab__item nav-item active">
                                <a class="nav-link active" data-bs-toggle="tab" href="#tab_list_06" role="tab">Login</a>
                            </li>
                            <li class="tab__item nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab_list_07" role="tab">Register</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content content-modal-box">
                        <div class="tab-pane fade show active" id="tab_list_06" role="tabpanel">
                            <form class="account-form-box" id="form-login">
                                <h6 class="mb-3">Login your account</h6>
                                <b id="form-login-error" class="text-red"></b>
                                <div class="single-input">
                                    <input name="email" type="text" placeholder="Email" required>
                                </div>
                                <div class="single-input">
                                    <input name="password" type="password" placeholder="Password" required>
                                </div>
                                <div class="checkbox-wrap mt-10">
                                    <label class="label-for-checkbox inline mt-15">
                                        <input class="input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever">
                                        <span>Remember me</span>
                                    </label>
                                    <a href="#" class="mt-10">Lost your password?</a>
                                </div>
                                <div class="button-box mt-25">
                                    <a href="#" class="btn btn--full btn--black" id="form-login-btn">Log in</a>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="tab_list_07" role="tabpanel">
                            <form class="account-form-box" id="form-register">
                                <h6 class="mb-6">Register An Account</h6>
                                <b id="form-register-error" class="text-red"></b>
                                <div class="single-input">
                                    <input name="name" type="text" placeholder="Name" required>
                                </div>
                                <div class="single-input">
                                    <input name="email" type="text" placeholder="Email Address" required>
                                </div>
                                <div class="single-input">
                                    <input name="password" type="password" placeholder="Password" required>
                                </div>
                                <div class="single-input">
                                    <input name="password_confirmation" type="password" placeholder="Confirm Password" required>
                                </div>
                                <p class="mt-15">
                                    Your personal data will be used to support your experience throughout this website, 
                                    to manage access to your account, and for other purposes described in our 
                                    <a href="#" class="text-color-primary" target="_blank">privacy policy</a>.
                                </p>
                                <div class="button-box mt-25">
                                    <a href="#" class="btn btn--full btn--black" id="form-register-btn">Register</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
