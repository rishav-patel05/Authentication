<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Page</title>
</head>
<body>
    @if($data)
        <!-- Displaying the user's name and ID -->
        <h1>Welcome <span style="color: blue;">{{ $data->name }}</span> (User ID: {{ $data->id }}) to HOME PAGE</h1>
        
        <!-- Link to log out -->
        <a href="{{ route('logout') }}">Logout</a>
    @else
        <!-- Display message for non-logged-in users -->
        <h1>Welcome to HOME PAGE</h1>
        <!-- Link to login page -->
        <a href="{{ route('login') }}">Login</a>
    @endif
</body>
</html>
