<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Page</title>
</head>
<body>
    <!-- Displaying the user's name and ID -->
    <h1>Welcome <span style="color: blue;">{{ $data['name'] }}</span> (User ID: {{ $data['id'] }}) to HOME PAGE</h1>
    
    <!-- Link to log out -->
    <a href="{{ url('logout') }}">Logout</a>
</body>
</html>
