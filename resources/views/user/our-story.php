@extends('layouts.app-public')
@section('title', 'Our Story')
@section('content')
    <style>
        .hero-section {
            background: url('https://images.unsplash.com/photo-1710937936215-4eb15ae75437?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center/cover;
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .hero-section p {
            font-size: 1.2rem;
            margin-top: 20px;
            color: black;
        }
        .content-section {
            padding: 60px 0;
        }
        .content-section img {
            max-width: 100%;
            border-radius: 10px;
        }
        .our-services{
            font-family: Arial, sans-serif;
            background-color: #f9fbf3;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
            margin: 30px 0;
        }
        .service-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }
        .service-card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: left;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }
        .service-card h3 {
            margin-top: 0;
            font-size: 20px;
            color: #333;
        }
        .service-card p {
            color: #555;
            font-size: 16px;
            line-height: 1.5;
        }
        .service-icon {
            width: 50px;
            height: 50px;
            margin-bottom: 15px;
        }
        .service-card img {
            width: 60px;
            height: 60px;
            flex-shrink: 0;
        }
        .service-content h3 {
            margin: 0;
            font-size: 20px;
            color: #333;
        }
        .service-content p {
            margin: 5px 0 0;
            color: #555;
            font-size: 14px;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Our Story</h1>
            <p>Discover how we started and what drives us to deliver the best Handphone, Laptop, for you.</p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content-section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-md-6">
                    <h2>About Us</h2>
                    <p>
                        GGStore started with a simple mission: to make the latest and most reliable mobile devices accessible to everyone. 
                        Since our founding in 2024, we have grown to become one of the trusted e-commerce platforms for Handphone, Laptop, and TV.
                    </p>
                    <p>
                        Our team is dedicated to providing top-notch customer service and ensuring every product meets the highest quality standards.
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="https://png.pngtree.com/png-clipart/20220602/original/pngtree-flat-vector-executive-manager-on-business-trip-illustration-png-image_7860281.png" alt="About Us Image" class="img-fluid shadow">
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-md-6 order-md-2">
                    <h2>Our Vision</h2>
                    <p>
                        We believe that technology should empower people. Our vision is to be the go-to platform for anyone looking to upgrade their mobile experience with confidence and ease.
                    </p>
                    <p>
                        Through innovation, trust, and transparency, we aim to redefine how people buy and use Elektronik item.
                    </p>
                </div>
                <div class="col-md-6 order-md-1">
                    <img src="https://halo-solusi-utama.com/assets/img/section-3.png" alt="Our Vision Image" class="img-fluid shadow">
                </div>
            </div>
        </div>
    </section>
    <div class="our-services">
    <h1>Our Services</h1>
    <div class="service-container">
        <!-- Card 1 -->
        <div class="service-card">
            <img src="https://cdn-icons-png.flaticon.com/512/1041/1041916.png" alt="Service Icon" class="service-icon">
            <div class="service-content">
            <h3>Preloved Marketplace</h3>
            <p>A platform for individuals to buy high quality, guaranteed preloved phones with confidence.</p>
              </div>
        </div>

        <!-- Card 2 -->
        <div class="service-card">
            <img src="https://cdn-icons-png.flaticon.com/512/2920/2920324.png" alt="Service Icon" class="service-icon">
            <div class="service-content">
            <h3>Trade-In Program</h3>
            <p>Exchange your old phone for a new one at thousands of partnered retail stores nationwide.</p>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="service-card">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Service Icon" class="service-icon">
            <div class="service-content">
            <h3>Business Solutions</h3>
            <p>Empower businesses to purchase preloved devices in bulk with ease and affordability.</p>
            </div>
        </div>
      

        <!-- Card 4 -->
        <div class="service-card">
            <img src="https://cdn-icons-png.flaticon.com/512/1057/1057194.png" alt="Service Icon" class="service-icon">
            <div class="service-content">
            <h3>Cash Offer Program</h3>
            <p>Sell your old devices and receive cash within 24 hours through our trusted platform.</p>
            </div>
        </div>

        <!-- Card 5 -->
        <div class="service-card">
            <img src="https://cdn-icons-png.flaticon.com/512/3063/3063463.png" alt="Service Icon" class="service-icon">
            <div class="service-content">
            <h3>Warranty and Quality</h3>
            <p>All devices are guaranteed with quality checks and a warranty to ensure buyer satisfaction.</p>
        </div>
        </div>


        <!-- Card 6 -->
        <div class="service-card">
            <img src="https://cdn-icons-png.flaticon.com/512/6943/6943104.png" alt="Service Icon" class="service-icon">
            <div class="service-content">
            <h3>Customer Support</h3>
            <p>Our team is available 24/7 to help resolve any issues or inquiries quickly and efficiently.</p>
        </div>
        </div>
    
    </div>

   </div> 


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection