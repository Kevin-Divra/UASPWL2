<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Home</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<style>
    /* ========== Global Styles ========== */
    body {
        margin: 0;
        font-family: 'Roboto', sans-serif;
        background-color: #F6F6F6;
        color: #333;
    }
    a {
        text-decoration: none;
    }

    /* ========== Navbar Styles ========== */
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #A97D52;
        padding: 15px 7%;
        color: #fff;
    }
    .navbar .logo {
        font-size: 1.8rem;
        font-weight: 700;
    }
    .navbar a {
        color: #fff;
        margin: 0 15px;
        font-size: 0.95rem;
    }
    .navbar a:hover {
        color: #FFD700;
    }

    /* ========== Hero Section ========== */
    .hero-section {
        background: url('https://via.placeholder.com/1200x500') no-repeat center/cover;
        text-align: center;
        padding: 100px 20px;
        color: #fff;
    }
    .hero-section h1 {
        font-size: 2.5rem;
        font-weight: 700;
    }
    .hero-section p {
        font-size: 1rem;
        margin-bottom: 30px;
    }
    .hero-section button {
        background-color: #FFD700;
        color: #333;
        padding: 12px 25px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 0.9rem;
    }
    .hero-section button:hover {
        background-color: #FFB800;
    }

    /* ========== Categories Section ========== */
    .categories {
        display: flex;
        justify-content: space-between;
        padding: 50px 7%;
    }
    .category-card {
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    .category-card:hover {
        transform: translateY(-5px);
    }
    .category-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }
    .category-card h3 {
        padding: 15px 0;
        font-size: 1.2rem;
        font-weight: 600;
    }

    /* ========== Featured Products ========== */
    .featured-products {
        background-color: #F4F4F4;
        padding: 50px 7%;
    }
    .featured-products h2 {
        text-align: center;
        font-size: 2rem;
        margin-bottom: 40px;
        color: #555;
    }
    .product-card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        text-align: center;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    .product-card:hover {
        transform: translateY(-5px);
    }
    .product-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }
    .product-card h3 {
        padding: 15px 0;
        font-size: 1rem;
        font-weight: 500;
    }
    .product-card button {
        background-color: #8B5E3C;
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        font-size: 0.85rem;
    }

    /* ========== Testimonials ========== */
    .testimonials {
        background-color: #333;
        color: #fff;
        padding: 50px 7%;
        text-align: center;
    }
    .testimonials h2 {
        font-size: 2rem;
        margin-bottom: 20px;
    }
    .testimonial-card {
        display: inline-block;
        background-color: #444;
        border-radius: 10px;
        padding: 20px;
        margin: 10px;
        color: #fff;
    }

    /* ========== Footer ========== */
    .footer {
        background-color: #333;
        color: #fff;
        padding: 40px 7%;
    }
    .footer-columns {
        display: flex;
        justify-content: space-between;
    }
    .footer-column ul {
        list-style: none;
        padding: 0;
    }
    .footer-column ul li a {
        color: #bbb;
        font-size: 0.9rem;
    }
</style>

<!-- Navbar -->
<nav class="navbar">
    <div class="logo">GGStore</div>
    <div>
        <a href="#categories">Categories</a>
        <a href="#products">Products</a>
        <a href="/user/profile">Profile</a>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <h1>Push Your Limit</h1>
    <p>Explore exclusive products and deals curated just for you</p>
    <div>
        <a href="/shop">Shop Now</a>
    </div>
</section>

<!-- Categories -->
<section class="categories" id="categories">
    <div class="category-card">
        <img src="https://via.placeholder.com/300x200" alt="Smartphone">
        <h3>Smartphones</h3>
    </div>
    <div class="category-card">
        <img src="https://via.placeholder.com/300x200" alt="Laptops">
        <h3>Laptops</h3>
    </div>
    <div class="category-card">
        <img src="https://via.placeholder.com/300x200" alt="Headphones">
        <h3>Headphones</h3>
    </div>
</section>

<!-- Featured Products -->
<section class="featured-products" id="products">
    <h2>Our Best Sellers</h2>
    <div class="product-card">
        <img src="https://via.placeholder.com/300x200" alt="Product 1">
        <h3>Product 1</h3>
        <button>Buy Now</button>
    </div>
    <div class="product-card">
        <img src="https://via.placeholder.com/300x200" alt="Product 2">
        <h3>Product 2</h3>
        <button>Buy Now</button>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="footer-columns">
        <div class="footer-column">
            <h3>Contact Us</h3>
            <ul>
                <li><a href="#">Email</a></li>
                <li><a href="#">Phone</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="#categories">Categories</a></li>
                <li><a href="#products">Products</a></li>
            </ul>
        </div>
    </div>
    <p>&copy; 2024 MyStore. All Rights Reserved.</p>
</footer>

</body>
</html>
