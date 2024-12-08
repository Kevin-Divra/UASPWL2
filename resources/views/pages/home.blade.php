<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icon-css/css/flag-icon.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <meta charset="UTF-8">
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
    body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #F1EBE7; /* Warna latar belakang utama */
        }
        .atasan{
            background-color: #A97D52;
            padding: 20px;
            color: white;
            display: flex;
        }
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
       
    .login-form, .register-form {
            background-color: #f0eae5;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-control {
            margin-bottom: 15px;
        }
        .btn-primary {
            background-color: #000;
            border-color: #000;
        }
            .middle {
            background-color: #F1EBE7; /* Warna latar belakang */
            padding: 50px 15px; /* Menambahkan ruang di kiri dan kanan */
            width: 100%; /* Pastikan lebar penuh */
}

.site-wrapper-reveal {
    background-color: #F1EBE7;
}

.container {
    max-width: 1200px; /* Lebar maksimum untuk konten */
    margin: 0 auto; /* Tengah secara horizontal */
}

.row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    /* Meratakan kedua kolom */
}

.col-md-6 {
    flex: 0 0 48%; /* Masing-masing kolom menempati 48% */
    margin: 1%; /* Memberikan ruang antar kolom */
    background-color: #F1EBE7;
}

.about-us-content_6{
    background-color: white;
}
.col-lg-12 {
    background-color: white;
}
.about-us-area {
    padding: 120px 0; /* Sesuaikan dengan jarak vertikal yang diinginkan */
    background-color: #f9f6f4; /* Sesuaikan dengan warna latar */
}

.about-us-content_6 {
    max-width: 1200px;
    margin: 0 auto;
    text-align: center;
    color: #333; /* Warna teks utama */
}

.about-us-content_6 h2 {
    font-size: 2rem; /* Ukuran font untuk judul utama */
    font-weight: bold;
    margin-bottom: 40px;
}

.about-us-content_6 h3 {
    font-size: 1.5rem; /* Ukuran font untuk sub-judul */
    font-weight: bold;
    margin-bottom: 15px;
}

.about-us-content_6 p {
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: 15px;
    color: #666; /* Warna teks deskripsi */
}

.about-us-content_6 a {
    font-size: 1rem;
    color: #0073e6; /* Warna link */
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

.about-us-content_6 a:hover {
    color: #005bb5; /* Warna link saat di-hover */
}

.about-us-content_6 .columns {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
}

.about-us-content_6 .columns div {
    text-align: left;
    max-width: 45%;
    flex: 1 1 auto; /* Agar fleksibel untuk layar kecil */
}

.footer-area-wrapper {
            background-color: #212121;
            color: #fff;
            padding: 40px 20px;
        }

        .footer-widget h3 {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #fff;
        }

        .footer-widget ul {
            list-style: none;
            padding: 0;
        }

        .footer-widget ul li {
            margin-bottom: 10px;
        }

        .footer-widget ul li a {
            text-decoration: none;
            color: #fff;
            transition: color 0.3s;
        }

        .footer-widget ul li a:hover {
            color: #a9a9a9;
        }

        .footer-social-and-flags {
    display: flex;
    justify-content: space-between; /* Membuat jarak antara ikon dan bendera */
    align-items: center; /* Menyelaraskan secara vertikal */
    margin-top: 20px;
    padding: 0 20px;
}

.footer-social-networks {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 10px; /* Jarak antar ikon */
}

.footer-social-networks li a {
    font-size: 20px;
    color: #fff;
    text-decoration: none;
}

.footer-social-networks li a:hover {
    color: #00bfa5;
}

.footer-flags {
    display: flex;
    gap: 5px; /* Jarak antar bendera */
}

.footer-flags .flag-icon {
    font-size: 20px;
    filter: invert(100%) grayscale(100%);
}


        .copyright-text {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-columns {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }

        .footer-column {
            flex: 1;
            min-width: 200px;
        }

</style>
<div class="atasan"></div>
    <!--Navbar Start-->
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
    <!-- navbar end -->
<div class="middle">
    <div class="site-wrapper-reveal">
        <div class="container">
            <div class="row">
                <!-- Login Form -->
                <div class="col-md-6">
                    <div class="login-form">
                        <h2>Login</h2>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Sign In</button>
                            <a href="" class="d-block text-center mt-2">Forgot Password?</a>
                        </form>
                    </div>
                </div>

                <!-- Register Form -->
                <div class="col-md-6">
                    <div class="register-form">
                        <h2>Create an Account</h2>
                        <form action="" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" class="form-control" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="post_code">Post Code</label>
                                    <input type="text" name="post_code" id="post_code" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" name="newsletter" id="newsletter" class="form-check-input">
                                <label for="newsletter" class="form-check-label">Email me with news and offers</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="about-us-area section-space--ptb_120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about-us-content_6 text-center">
                    <h2>The Allbirds Approach</h2>
                    <div style="display: flex; justify-content: center; align-items: flex-start; gap: 30px;">
                        <div style="text-align: left; max-width: 45%;">
                            <h3>All-Day Performance</h3>
                            <p>Sustainability in Every Device</p>
                            <a href="#">Learn More</a>
                        </div>
                        <div style="text-align: left; max-width: 45%;">
                            <h3>Materials Built to Last</h3>
                            <p>
                                Powerful, reliable, and incredibly intuitive, our devices make every task effortless. 
                                Whether it’s a smartphone, laptop, or smart TV, enjoy seamless performance and user-friendly features 
                                designed for your daily life.
                            </p>
                            <p>
                                From production to packaging, we’re committed to reducing our environmental impact. 
                                Achieving sustainability isn’t a distant goal—it’s a priority today. We prioritize 
                                high-quality materials and energy-efficient technology. By integrating innovation with 
                                eco-conscious practices, we offer devices that are durable, efficient, and better for 
                                the planet—a win for you and the environment.
                            </p>
                            <a href="#">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


        <div class="footer-area-wrapper">
        <div class="container">
            <div class="footer-columns">
                <div class="footer-column footer-widget">
                    <h3>Help</h3>
                    <ul>
                        <li><a href="#">1-888-963-8944</a></li>
                        <li><a href="#">1-814-251-9966 (Text)</a></li>
                        <li><a href="#">help@allbirds.com</a></li>
                        <li><a href="#">Returns/Exchanges</a></li>
                        <li><a href="#">FAQ/Contact Us</a></li>
                        <li><a href="#">Afterpay</a></li>
                    </ul>
                </div>
                <div class="footer-column footer-widget">
                    <h3>Shop</h3>
                    <ul>
                        <li><a href="#">Handphone</a></li>
                        <li><a href="#">Laptop</a></li>
                        <li><a href="#">TV</a></li>
                    </ul>
                </div>
                <div class="footer-column footer-widget">
                    <h3>Company</h3>
                    <ul>
                        <li><a href="#">Our Stores</a></li>
                        <li><a href="#">Our Story</a></li>
                        <li><a href="#">Our Materials</a></li>
                        <li><a href="#">Investors</a></li>
                        <li><a href="#">Bulk Orders</a></li>
                        <li><a href="#">Community Offers</a></li>
                        <li><a href="#">Our Blog</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-social-and-flags">
            <div class="footer-social-networks">
                <li><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></li>
                <li><a href="https://tiktok.com"><i class="fab fa-tiktok"></i></a></li>
                <li><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://facebook.com"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://youtube.com"><i class="fab fa-youtube"></i></a></li>
                <li><a href="https://pinterest.com"><i class="fab fa-pinterest"></i></a></li>
            </div>
            <div class="footer-flags">
                <span class="flag-icon flag-icon-us"></span>
                <span class="flag-icon flag-icon-ca"></span>
                <span class="flag-icon flag-icon-au"></span>
                <span class="flag-icon flag-icon-nz"></span>
                <span class="flag-icon flag-icon-gb"></span>
                <span class="flag-icon flag-icon-cn"></span>
                <span class="flag-icon flag-icon-jp"></span>
                <span class="flag-icon flag-icon-kr"></span>
                <span class="flag-icon flag-icon-de"></span>
            </div>
            </div>
            <div class="copyright-text">
                &copy; 2024 Allbirds, Inc. All Rights Reserved.
            </div>
        </div>
    </div>


    </div>
<script>
        feather.replace();
      </script>
</body>
</html>
