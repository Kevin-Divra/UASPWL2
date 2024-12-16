<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .container {
            max-width: auto;
        }
        h3 {
            color: #343a40;
            font-weight: bold;
        }
        .card {
            border-radius: 10px;
            border: none;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-success, .btn-danger, .btn-primary, .btn-warning {
            border-radius: 50px;
        }
        .remove-product-btn {
            border-radius: 50px;
        }
    </style>
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3>Order Details</h3>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">

                        <!-- Transaction Info -->
                        <div class="mb-4">
                            <h5>Order ID: {{ $data->id }}</h5>
                            <p><strong>Date:</strong> {{ $data->created_at->format('d-m-Y H:i') }}</p>
                            <p><strong>Email Buyer:</strong> {{ ucwords($data->buyer_email) }}</p>
                        </div>

                        <!-- Products Table -->
                        <h5>Products Purchased</h5>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $productNames = explode(', ', $data->product_names);
                                    $productPrices = explode(', ', $data->product_prices);
                                    $quantities = explode(', ', $data->product_quantities);
                                @endphp

                                @foreach ($productNames as $index => $productName)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ ucwords($productName) }}</td>
                                        <td>Rp {{ number_format($productPrices[$index], 0, ',', '.') }}</td>
                                        <td>{{ $quantities[$index] }}</td>
                                        @php
                                            $price = (float)$productPrices[$index]; // Cast price to float
                                            $quantity = (int)$quantities[$index]; // Cast quantity to int
                                            $subtotal = $price * $quantity;
                                        @endphp
                                        <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            <h5><strong>Total Amount:</strong> Rp {{ number_format($data->total_transaction, 0, ',', '.') }}</h5>
                        </div>

                        <a href="{{ route('order.index') }}" class="btn btn-primary mt-4">Back to Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>