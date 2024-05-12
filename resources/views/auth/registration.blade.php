<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Registration Form</title>
</head>
<body>

    <form action="{{route('register-user')}}" method="post">
        @if (Session::has('success'))
            <div class="text-ok">{{Session::get('success')}}</div>
        @endif
        @if (Session::has('fail'))
        <div class="text-danger">{{Session::get('fail')}}</div>
        @endif
        @csrf
        <h2>Sign Up</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <span class="text-danger">@error('name'){{$message}} @enderror</span>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <span class="text-danger">@error('email'){{$message}} @enderror</span>

        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender">
        <span class="text-danger">@error('gender'){{$message}} @enderror</span>

        <label for="department">Department:</label>
        <input type="text" id="department" name="department">
        <span class="text-danger">@error('department'){{$message}} @enderror</span>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <span class="text-danger">@error('password'){{$message}} @enderror</span>

        <input type="submit" value="Register">
        <a href="login">Already Have Account?</a>
        <a href=""></a>
    </form>

</body>
</html>
