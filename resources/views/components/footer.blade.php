<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Footer</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icon-css/css/flag-icon.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <style>
            body {
                margin: 0;
                font-family: Arial, sans-serif;
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
    </head>
    <body>
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
    </body>
    </html>