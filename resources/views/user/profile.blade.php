@extends('layouts.app-public')
@section('title', 'Home')
@section('content')
  <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F5F5F5;
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
    </style>
    <!-- navbar end -->
    <div class="header">
        <div class="user-info">
            <img src="https://png.pngtree.com/png-vector/20240131/ourmid/pngtree-man-profile-account-picture-character-png-image_11577305.png" alt="Profile Picture">
            <div>
                <h2>{{ ucwords($user->name) }}</h2>          
            </div>
        </div>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit">Logout</button>
        </form>    
    </div>
    <div class="content">
        <div class="profile-info">
            <h3>Profile Info</h3>
            <p><strong>Username:</strong> {{ ucwords($user->name) }}</p>
            <p><strong>Email:</strong> {{ ($user->email) }}</p>
        </div>
        <div class="address-info">
            <h3>Address</h3>
            @if($user->address)
                <p><strong>Street:</strong> {{ ucwords($user->address->street) }}</p>
                <p><strong>City:</strong> {{ ucwords($user->address->city) }}</p>
                <p><strong>Pos Code:</strong> {{ ucwords($user->address->post_code) }}</p>
            @else
                <p><em>No address provided yet.</em></p>
            @endif
        </div>
    </div>
    <div class="container my-4 edit-container">
        <div class="row">
            <!-- Edit Profile -->
            <div class="col-md-6">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h5 class="form-title">Edit Profile</h5>

                    <div class="mb-3">
                        <label for="name" class="form-label">New Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', auth()->user()->name) }}">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">New Password:</label>
                        <input type="password" class="form-control" name="password" id="password">                    
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm New Password:</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                    </div>
                    @if ($errors->any())
                        <div class="error-message">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-dark">Save Profile</button>
                </form>
            </div>
            <!-- Edit Address -->
            <div class="col-md-6">
                <form action="{{ route('profile.updateAddress') }}" method="POST">
                    @csrf
                    <h5 class="form-title">Edit Address</h5>

                    <div class="mb-3">
                        <label for="street" class="form-label">New Street</label>
                        <input type="text" class="form-control" id="street" name="street" value="{{ old('street', optional($user->address)->street) }}">
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">New City</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ old('city', optional($user->address)->city) }}">
                    </div>

                    <div class="mb-3">
                        <label for="pos" class="form-label">New Code POS</label>
                        <input type="text" class="form-control" id="pos" name="post_code" value="{{ old('post_code', optional($user->address)->post_code) }}">
                    </div>

                    <button type="submit" class="btn btn-dark">Save Address</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('addition_css')
@endsection
@section('addition_script')
    <!-- <script src="{{asset('pages/js/plp.js')}}"></script> -->
@endsection