<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icon-css/css/flag-icon.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F5F5F5;
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
        }
        #ikonnav:hover{
            color: red;
        }
        .header {
            background-color: #A97D52;
            padding: 40px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header .user-info {
            display: flex;
            align-items: center;
        }
        .header .user-info img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #ccc;
            margin-right: 15px;
        }
        .header .user-info h2 {
            margin: 0;
            font-size: 20px;
        }
        .header .user-info p {
            margin: 0;
            font-size: 14px;
            color: #fff;
        }
        .header button {
            background-color: #A97D52;
            color: white;
            padding: 10px 15px;
            border-color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .content {
            display: flex;
            justify-content: space-between;
            padding: 30px;
        }
        .content .profile-info,
        .content .address-info {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 48%;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .content .profile-info h3,
        .content .address-info h3 {
            margin-bottom: 15px;
            color: #977450;
        }
        .content .profile-info p,
        .content .address-info p {
            margin: 5px 0;
        }
        .content .edit-section {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        .content .edit-section .form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 48%;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .content .edit-section .form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .content .edit-section .form button {
            width: 100%;
            background-color: #A97D52;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        /* Styling for Edit Profile Form */
        .content .edit-section .form-profile input {
            background-color: #F2EADB;
        }
        .content .edit-section .form-address input {
            background-color: #F5F5F5;
        }
        .edit-container {
        background-color: #A97D52; /* Warna cokelat */
        padding: 20px;
        border-radius: 10px;
        }
        .form-title {
        text-align: center;
        font-weight: bold;
        color: black;
        }
        .form-label {
        color: black;
        }
        .btn-dark {
        background-color: #000000;
        color: #FFFFFF;
        border: none;
        margin-top: 20px;
        }
        .btn-dark:hover {
        background-color: #333333;
        }
        .btn-submit {
        width: 50%; /* Tombol lebih panjang */
        padding: 10px; /* Tambahan ruang di dalam tombol */
        }
        .form-control {
        border-radius: 0;
        border: 1px solid #333;
        }
        .container {
        max-width: 900px;
        margin: 0 auto;
        }
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px;
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
            color: #A9A9A9;
        }
        .footer-social-and-flags {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding: 0 20px;
        }
        .footer-social-networks {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 10px;
        }
        .footer-social-networks li a {
            font-size: 20px;
            color: #fff;
            text-decoration: none;
        }
        .footer-social-networks li a:hover {
            color: #00BFA5;
        }
        .footer-flags {
            display: flex;
            gap: 5px;
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
    <!-- navbar end -->
    <div class="header">
        <div class="user-info">
            <img src="https://png.pngtree.com/png-vector/20240131/ourmid/pngtree-man-profile-account-picture-character-png-image_11577305.png" alt="Profile Picture">
            <div>
                <h2>John Doe</h2>
                <p>Designer | UI/UX</p>
                <p>Passionate about creating engaging interfaces</p>
            </div>
        </div>
        <button type="submit">Logout</button>
    </div>
    <div class="content">
        <div class="profile-info">
            <h3>Profile Info</h3>
            <p><strong>Username:</strong> Peterr</p>
            <p><strong>Email:</strong> Peterr@gmail.com</p>
            <p><strong>Password:</strong> Peter123</p>
        </div>
        <div class="address-info">
            <h3>Address</h3>
            <p><strong>Street:</strong> Jl. Fatmawati No. 26, Cilandak, Jakarta, Indonesia</p>
            <p><strong>City:</strong> Jakarta</p>
            <p><strong>Pos Code:</strong> 14412</p>
        </div>
    </div>
        <div class="container my-4 edit-container">
    <div class="row">
        <!-- Edit Profile -->
        <div class="col-md-6">
        <form>
            <h5 class="form-title">Edit Profile</h5>
            <div class="mb-3">
            <label for="username" class="form-label">New Username</label>
            <input type="text" class="form-control" id="username" />
            </div>
            <div class="mb-3">
            <label for="email" class="form-label">New Email</label>
            <input type="email" class="form-control" id="email" />
            </div>
            <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="password" />
            </div>
        </form>
        </div>
        <!-- Edit Address -->
        <div class="col-md-6">
        <form>
            <h5 class="form-title">Edit Address</h5>
            <div class="mb-3">
            <label for="street" class="form-label">New Street</label>
            <input type="text" class="form-control" id="street" />
            </div>
            <div class="mb-3">
            <label for="city" class="form-label">New City</label>
            <input type="text" class="form-control" id="city" />
            </div>
            <div class="mb-3">
            <label for="pos" class="form-label">New Code POS</label>
            <input type="text" class="form-control" id="pos" />
            </div>
        </form>
        </div>
    </div>
    <!-- Submit Button -->
    <div class="row">
        <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-dark btn-submit">Submit</button>
        </div>
    </div>
    </div>
    <!-- Footer start -->
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
    <!-- Footer end -->
    <!-- feather icon -->
    <script>
        feather.replace();
      </script>
</body>
</html>
