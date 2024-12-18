<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Show Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Background styling */
        body {
            background-color: #f9f9f9;
            font-family: 'Poppins', sans-serif;
        }

        /* Container styling */
        .container {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        /* Product header styling with background color */
        .product-header {
            font-size: 2rem;
            font-weight: 700;
            color: white;
            background-color: #1d3557;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 30px;
        }

        /* Card styling for the image */
        .card-image {

            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            text-align: center;
        }

        /* Product image styling */
        .product-image {
            border-radius: 15px;
    
            width: 100%;
            height: auto;
            object-fit: cover;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            max-height: 300px;
        }

        /* Product details section */
        .product-details-section {
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            
        }

        /* Product title */
        .product-title {
            font-size: 2rem;
            font-weight: bold;
            color: #1d3557;
        }

        /* Product details text */
        .product-details {
            font-size: 1.2rem;
            color: #6c757d;
            margin-bottom: 10px;
        }

        /* Price styling */
        .product-price {
            font-size: 2rem;
            font-weight: bold;
            color: #1d3557;
            margin-bottom: 15px;
        }

        /* Code block styling */
        code {
            background-color: #f0f4f8;
            padding: 15px;
            border-radius: 8px;
            display: block;
            font-size: 1rem;
            color: #333;
            margin-bottom: 20px;
            white-space: pre-wrap;
        }

        /* Horizontal line styling */
        hr {
            border: 1px solid #e0e4e8;
        }

        /* Back button styling */
        .btn-back {
            background-color: #1d3557;
            color: white;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 1.1rem;
            display: inline-block;
            text-align: center;
            text-decoration: none;
            margin-top: 20px;
            width: 100%;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-back:hover {
            background-color: #36526b;
            transition: background-color 0.3s ease;
        }

        /* Additional styling for responsiveness */
        @media (max-width: 768px) {
            .product-header {
                font-size: 1.5rem;
            }

            .product-price {
                font-size: 1.5rem;
            }

            code {
                font-size: 0.9rem;
            }

            .container {
                padding-left: 15px;
                padding-right: 15px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h3 class="product-header">Show Product</h3>
        <div class="row">
            <!-- Left Column: Product Image -->
            <div class="col-lg-4 col-md-5 col-sm-12 mb-4">
                <div class="card-image">
                    <img src="{{ asset('/storage/images/' .$product->image) }}" alt="Product Image" class="product-image">
                </div>
            </div>
            <!-- Right Column: Product Details -->
            <div class="col-lg-8 col-md-7 col-sm-12">
                <div class="product-details-section">
                    <h3 class="product-title">{{ ucwords($product->title) }}</h3>
                    <hr />
                    <p class="product-details">Category: <strong>{{ ucwords($product->product_category_name) }}</strong></p>
                    <p class="product-price">Price: Rp{{ number_format($product->price, 2, ',', '.') }}</p>
                    <hr />
                    <code>
                        <p>{!! ucwords($product->description) !!}</p>
                    </code>
                    <p class="product-details">Stock: <strong>{{ $product->stock }}</strong></p>
                    <a href="javascript:history.back()" class="btn-back">Back</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
