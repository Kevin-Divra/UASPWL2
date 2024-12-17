
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icon-css/css/flag-icon.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!--Feather Icon-->
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .atasan{
            background-color: #a97d52; 
            
            color: white; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 60px; 
            text-align: center; 
            font-size: 16px; 
            font-weight: bold;
        }
        .invoice {
        background-color: #fff;
        /* margin: 20px auto; */
        padding: 20px;
        border: 1px solid #ddd;
        /* border-radius: 8px; */
        max-width: 100%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .invoice-header h3 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        .invoice-recipient h4 {
            margin: 10px 0;
            font-size: 16px;
            color: #555;
        }

        .invoice-recipient p {
            margin: 4px 0;
            font-size: 14px;
            color: #666;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .invoice-table th, .invoice-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .invoice-table th {
            background-color: #f9f9f9;
            font-size: 14px;
            font-weight: bold;
        }

        .invoice-table td {
            font-size: 14px;
            color: #555;
        }

        .invoice-summary {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }

        .invoice-summary p {
            margin: 5px 0;
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
</head>
<body>
    <div class="atasan">
        <p>Gift Confidently: Free Shipping on Orders Over $75 & Free Extended Returns After The Holidays</p>
    </div>
    <div class="invoice">
    <div class="invoice-header">
        <div class="left-section">
            <h3>DITERBITKAN ATAS NAMA</h3>
            <p>Penjual: GadgetGalaxy</p>
        </div>
        <div class="right-section">
            <h3>INVOICE</h3>
            <p>INV/2024110/GPL/432814343</p>
        </div>
    </div>
    <div class="invoice-recipient">
        <h4>UNTUK</h4>
        <p>Pembeli: Peterr</p>
        <p>Email: peterr@gmail.com</p>
        <p>Tanggal Pembelian: 1-10-2024</p>
        <p>Alamat Pengiriman: Jl. Fatmawati No. 26, Cilandak, Jakarta, Indonesia</p>
        <p>Code POS: 14412</p>
    </div>
    <table class="invoice-table">
        <thead>
            <tr>
                <th>INFO PRODUK</th>
                <th>JUMLAH</th>
                <th>TOTAL HARGA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Iphone 13</td>
                <td>1</td>
                <td>RP. 9.500.000</td>
            </tr>
        </tbody>
    </table>
    <div class="invoice-summary">
        <p>TOTAL BELANJA: RP. 9.500.000</p>
        <p>TOTAL TAGIHAN: RP. 9.500.000</p>
        <p>Metode Pembayaran: BCA Virtual Account</p>
        <p>Terakhir diupdate: 6 Desember 2024 02:07 WIB</p>
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
