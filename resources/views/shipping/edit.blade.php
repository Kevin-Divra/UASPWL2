<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f9fc;
        }
        .container {
            max-width: 1000px;
            margin: auto;
            padding: 20px;
        }
        h3 {
            color: #343a40;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }
        .card {
            border-radius: 15px;
            border: none;
            padding: 30px;
            background: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: bold;
            color: #495057;
        }
        .form-control {
            border-radius: 10px;
            padding: 10px;
            border: 1px solid #ced4da;
        }
        .btn-success, .btn-danger, .btn-primary, .btn-warning {
            border-radius: 12px;
            padding: 12px;
            width: 150px;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-success {
            background-color: #457b9d;
        }
        .btn-success:hover {
            background-color: #1d3557;
        }
        .btn-warning {
            background-color: #f4a261;
        }
        .btn-warning:hover {
            background-color: #e76f51;
        }
        .remove-product-btn {
            border-radius: 50px;
            background-color: #e63946;
            color: white;
            transition: background-color 0.3s;
        }
        .remove-product-btn:hover {
            background-color: #d62839;
        }
        .alert {
            margin-top: 10px;
        }
        .product-row {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container mt-5 mb-5">
    <h3>Edit Shipping Status</h3>
    <div class="card border-0 shadow-sm rounded">
        <div class="card-body">
            <form id="transactionForm" action="{{ route('shipping.update', $data['shippings']->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="completed" {{ old('status', $data['shippings']->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="fail" {{ old('status', $data['shippings']->status) == 'fail' ? 'selected' : '' }}>Fail</option>
                        <option value="ongoing" {{ old('status', $data['shippings']->status) == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                    </select>
                </div>

                <!-- Button Row -->
                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-md btn-primary mx-2">Save Changes</button>
                    <button type="button" id="resetBtn" onclick="resetForm()" class="btn btn-md btn-warning mx-2">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function resetForm() {
            document.getElementById("transactionForm").reset(); // Reset all values in the form
        }
    </script>
</body>
</html>
