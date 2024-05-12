<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Login Form</title>
</head>
<body>
        
    <form action="{{route('login-user')}}" method="post">
        @if (Session::has('success'))
        <div class="text-ok">{{Session::get('success')}}</div>
         @endif
         @if (Session::has('fail'))
         <div class="text-danger">{{Session::get('fail')}}</div>
         @endif
        @csrf
        <h2>Log In</h2>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" >
        <span class="text-danger">@error('email'){{$message}} @enderror</span>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" >
        <span class="text-danger">@error('password'){{$message}} @enderror</span>

        <input type="submit" value="Login">
        <a href="registration">Don't Have Account?</a>
        <a href="{{ url('/change-password-form') }}">Change Password</a>

    </form>

</body>
</html>
