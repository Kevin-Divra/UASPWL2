<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Choice</title>
    <style>
        /* CSS untuk tombol */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f7f9fc;
        }

        .login-choice-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .choice-btn {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin: 10px 0;
            transition: background-color 0.3s ease;
        }

        .choice-btn:hover {
            background-color: #45a049;
        }

        .choice-btn:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <div class="login-choice-container">
        <h2>Choose Login Type</h2>
        <form action="{{ route('admin.login') }}" method="GET">
            <button type="submit" class="choice-btn">Login as Admin</button>
        </form>
        <form action="{{ route('user.login') }}" method="GET">
            <button type="submit" class="choice-btn">Login as User</button>
        </form>
    </div>
</body>
</html>
