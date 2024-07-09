<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            @if($data)
                <li class="logout"><a href="{{ route('logout') }}">Logout</a></li>
            @else
                <li class="logout"><a href="{{ route('login') }}">Login</a></li>
            @endif
        </ul>
    </nav>
    <div class="content">
        @if($data)
            <h1>Welcome <span>{{ $data->name }}</span> to HOME PAGE</h1>
            <a class="cta-button" href="{{ route('records')}}">SHOW DATA</a>
        @else
            <h1>Welcome to HOME PAGE</h1>
        @endif
       
    </div>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        nav {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        nav ul li {
            margin: 0 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        .logout {
            margin-right: auto;
        }

        .logout a {
            background-color: #007BFF;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .logout a:hover {
            background-color: #0056b3;
        }

        .content {
            text-align: center;
            margin-top: 50px;
        }

        h1 {
            font-size: 36px;
            color: #333;
        }

        h1 span {
            color: blue;
        }

        .cta-button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .cta-button:hover {
            background-color: #0056b3;
        }
    </style>
</body>
</html>
