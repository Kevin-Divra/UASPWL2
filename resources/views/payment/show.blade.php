<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"> <!-- Font Poppins -->
    <style>
        /* General styling */
        body {
            background-color: #f4f6f9;
            font-family: 'Poppins', sans-serif;
            padding-top: 50px;
        }

        /* Container with padding */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
        }

        h3 {
            color: #343a40;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
            font-size: 2rem; /* Larger title */
        }

        /* Card Styling */
        .card {
            border-radius: 12px;
            border: none;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px; /* More padding inside the card */
            background-color: #ffffff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Hover effect for the card */
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.15);
        }

        /* Transaction info styling */
        .transaction-info {
            margin-bottom: 30px; /* Add space between transaction info and table */
        }

        .transaction-info p {
            font-size: 1.1rem;
            color: #6c757d;
            margin-bottom: 15px; /* Add space between lines */
            line-height: 1.6; /* Increase line height */
        }

        .transaction-info p strong {
            color: #343a40;
        }

        /* Table Styling */
        .table {
            background-color: #f9fafb;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.05);
            margin-top: 20px; /* Add space above the table */
        }

        .table th {
            background-color: #1d3557;
            color: #ffffff;
            text-align: center;
        }

        .table td {
            text-align: center;
            color: #343a40;
            line-height: 1.6; /* Increase spacing between lines in table */
        }

        /* Total Amount and Status Styling */
        .total-amount, .status {
            font-size: 1.3rem;
            font-weight: bold;
            color: #1d3557;
            margin-top: 30px; /* Space above the total and status */
            line-height: 1.5; /* Adjust line spacing */
        }

        .total-amount {
            margin-bottom: 20px; /* Space below total amount */
        }

        /* Back Button Styling */
        .btn-primary {
            border-radius: 50px;
            padding: 10px 20px;
            font-size: 1.1rem;
            background-color: #1d3557;
            border: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
            margin-top: 30px; /* Space above the button */
        }

        /* Hover effect on back button */
        .btn-primary:hover {
            background-color: #36526b;
            transform: translateY(-5px);
        }

        /* Responsive styling for mobile */
        @media (max-width: 768px) {
            h3 {
                font-size: 1.5rem;
            }

            .table th, .table td {
                font-size: 0.9rem;
            }

            .total-amount, .status {
                font-size: 1.1rem;
            }

            .btn-primary {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h3>Payment Details</h3>
        <div class="card">
            <div class="card-body">

                <!-- Transaction Info -->
                <div class="transaction-info">
                    <h5 class="mb-4">Order Information</h5>
                    <p><strong>Order ID:</strong> {{ $data->id_order }}</p>
                    <p><strong>Date:</strong> {{ $data->created_at->format('d-m-Y H:i') }}</p>
                    <p><strong>Buyer Email:</strong> {{ ucwords($data->buyer_email) }}</p>
                    <p><strong>Buyer Name:</strong> {{ ucwords($data->name) }}</p>
                </div>

                <!-- Products Table -->
                <h5 class="mb-4">Products Purchased</h5>
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

                <!-- Total and Status -->
                <div class="total-amount">
                    <strong>Total Amount:</strong> Rp {{ number_format($data->total_price, 0, ',', '.') }}
                </div>
                <div class="status">
                    <strong>Status:</strong> {{ ucwords($data->status) }}
                </div>

                <!-- Back Button -->
                <a href="{{ route('payment.index') }}" class="btn btn-primary">Back to Payments</a>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
