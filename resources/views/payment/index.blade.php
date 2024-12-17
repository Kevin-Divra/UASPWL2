<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Payments</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Roboto', sans-serif;
            transition: background-color 0.3s, color 0.3s;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 240px;
            background-color: #DDE7E7;
            padding-top: 1px;
        }
        .sidebar a {
            display: flex;
            align-items: center;
            justify-content: center; 
            gap: 10px; 
            padding: 15px;
            color: #585656;
            text-decoration: none;
            font-size: 18px;
        }
        .sidebar a i {
            font-size: 20px; 
        }
        .sidebar a:hover {
            background-color: #2F609C;
            color: #FFD941;
        }
        .sidebar h2 {
            color: #585656;
            text-align: center;
            background-color: #FFD700; 
            padding: 10px; 
            margin: 0; 
            height: 100px; 
            display: flex;
            align-items: center; 
            justify-content: center;
            border-radius: 5px;
        }
        .main-content {
            margin-left: 260px;
            padding: 20px;
        }
        .dashboard-overview {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        .card {
            background: #fff;
            border-radius: 5px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            text-align: center;
        }
        .card h3 {
            margin: 0;
            font-size: 18px;
            color: #002D72;
        }
        .card .number {
            font-size: 28px;
            color: #28a745;
            margin-top: 10px;
        }
    
        .table-wrapper {
            background: #fff;
            margin-top: 0.2px;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
            transition: background-color 0.3s;
            border-radius: 5px;
        }
        .table-title {
            padding: 15px 15px 5px;
            margin-bottom: 10px;
            background-color: #2F609C;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .table-title h2 {
            margin: 0;
            color: #FFFFFF;
            font-size: 24px;
            flex-grow: 1; 
            
        }
        .table-title .btn {
            background-color: #28a745;
            color: #fff;
            border-radius: 5px;
            border: none;
        }
        table.table thead th {
            font-weight: bold;
            background-color: #FFD700;
            color: #002D72;
            text-align: center;
            border-color: #e9e9e9;
            border-width: 2px;
        }
        table.table {
            text-align: center;
        }
        table.table-striped > tbody > tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }
        table.table-striped > tbody > tr:nth-of-type(even) {
            background-color: #f5f5f5;
        }
        table.table-striped.table-hover tbody tr:hover {
            background: #f0f0f0;
        }
        table.table td {
            vertical-align: middle;
        }
        table.table td a.view {
            color: #03A9F4;
        }
        table.table td a.edit {
            color: #FFC107;
        }
        table.table td a.delete {
            color: #E34724;
        }

        table.table td img {
            display: block;
            margin: 0 auto;
            max-height: 80px;
            width: auto;
            object-fit: cover;
        }
        .material-icons {
            color: inherit;
        }
        .material-icons:hover {
            color: #FFD700;
        }
        .table-title .btn:hover {
            background-color: #218838;
        }
        .dark-mode {
            background-color: #121212;
            color: #e0e0e0;
        }
        .dark-mode .table-wrapper {
            background: #1e1e1e;
        }
        .dark-mode table.table thead th {
            background-color: #333333;
            color: #FFD700;
        }
        .dark-mode .sidebar {
            background-color: #1e1e1e;
        }
        .dark-mode .sidebar a {
            color: #bbb;
        }
        .dark-mode .sidebar a:hover {
            background-color: #333;
            color: #FFD700;
        }
        .dark-mode .sidebar h2 {
            background-color: #333;
            color: #FFD700;
        }
        .dark-mode .main-content {
            background-color: #1e1e1e;
        }
        .dark-mode .card {
            background: #2c2c2c;
            color: #e0e0e0;
        }
        .dark-mode .table-wrapper {
            background: #1e1e1e; 
         }

        .dark-mode .table-title {
            background-color: transparent; 
            border: 2px solid #E7E7E7;
        }
        .dark-mode table.table thead th {
            background-color: #333;
            color: #FFD700;
        }
        .dark-mode table.table-striped > tbody > tr:nth-of-type(odd) {
            background-color: #2c2c2c;
        }
        .dark-mode table.table-striped > tbody > tr:nth-of-type(even) {
            background-color: #1e1e1e;
        }
        .dark-mode table.table-striped.table-hover tbody tr:hover {
            background-color: #444;
        }
        .dark-mode table.table td {
            color: #e0e0e0;
        }

        .dark-mode .material-icons {
            color: #FFD700;
        }
        .dark-mode .material-icons:hover {
            color: #e0e0e0;
        }
        .dark-mode .table-title .btn {
            background-color: #444; 
            color: #fff;
        }
        .dark-mode-toggle {
            position: fixed;
            bottom: 20px;
            left: 200px;
            background-color: #03A9F4;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s, color 0.3s;
        }
        .dark-mode .dark-mode-toggle {
            background-color: #FFD700;
            color: #000;
        }
        
    </style>
</head>
<body>
    <div class="sidebar">
        <h2><i class="fas fa-tachometer-alt" style="margin-right: 10px"></i> Dashboard</h2>
        <a href="{{ url('/products') }}"><i class="fas fa-box"></i> Products</a>
        <a href="{{ url('/order') }}"><i class="fas fa-shopping-cart"></i> Orders</a>
        <a href="{{ url('/payment') }}"><i class="fas fa-money-bill-wave"></i> Payments</a>
        <a href="{{ url('/shipping') }}"><i class="fas fa-truck"></i> Shippings</a>
    </div>


    <div class="main-content">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <h2>Data Payment 101</h2>
                </div>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th >ID ORDER</th>
                            <th >ORDER DATE</th>
                            <th >PRODUCT NAME</th>
                            <th >UNIT</th>
                            <th >TOTAL</th>
                            <th >STATUS</th>
                            <th >ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($payments as $payment)
                            @php
                                $products = explode(', ', $payment->product_names);
                                $quantities = explode(', ', $payment->product_quantities);
                                $rowCount = count($products);
                            @endphp
                            
                            @foreach ($products as $index => $product_name)
                                <tr>
                                    @if ($index === 0)
                                        <td rowspan="{{ $rowCount }}">{{ $payment->id_order }}</td>
                                        <td rowspan="{{ $rowCount }}">{{ $payment->created_at }}</td>
                                    @endif
                                    <td>{{ ucwords($product_name) }}</td>
                                    <td>{{ number_format($quantities[$index]) }}</td> <!-- Fix here -->

                                    @if ($index === 0)
                                        <td rowspan="{{ $rowCount }}">{{ number_format($payment->total_price, 2, ',', '.') }}</td>
                                        <td rowspan="{{ $rowCount }}">{{ ucwords($payment->status) }}</td>
                                        
                                        <td rowspan="{{ $rowCount }}" class="text-center">
                                            <a href="{{ route('payment.show', $payment->id) }}" class="view" data-toggle="tooltip" title="View">
                                            <i class="material-icons">&#xE417;</i>
                                            </a>
                                            <a href="{{ route('payment.edit', $payment->id) }}" class="edit" data-toggle="tooltip" title="Edit">
                                            <i class="material-icons">&#xE254;</i> 
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach                                      
                        @empty
                            <div class="alert alert-danger">
                                Data Payment belum tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
                {{ $payments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="dark-mode-toggle" onclick="toggleDarkMode()"><i class="fas fa-moon"></i></button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.querySelectorAll('.material-icons').forEach(function(icon) {
        icon.addEventListener('mouseenter', function() {
            this.style.color = '#FFD700';
        });
        icon.addEventListener('mouseleave', function() {
            this.style.color = '';
        });
    });

        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
            localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
        }

        if (localStorage.getItem('darkMode') === 'true') {
            document.body.classList.add('dark-mode');
        }

        function showDeleteConfirmation(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "you want to delete this data",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#E34724',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }

        // message with sweetalert
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'BERHASIL',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'GAGAL',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
</body>
</html>