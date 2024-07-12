<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
   
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    input, select {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45A049;
    }

    .text-danger {
        color: red;
    }

    .text-ok {
        color: green;
    }
</style>


<form action="{{ url('change-password') }}" method="post">
    @csrf
    @if(Session::has('success'))
        <div class="text-ok">{{ Session::get('success') }}</div>
    @endif
    @if(Session::has('fail'))
        <div class="text-danger">{{ Session::get('fail') }}</div>
    @endif

    <h2>Change Password</h2>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" required>

    <label for="old_password">Old Password:</label>
    <input type="password" id="old_password" name="old_password" required>

    <label for="new_password">New Password:</label>
    <input type="password" id="new_password" name="new_password" required>

    <label for="confirm_password">Confirm New Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>
    @error('confirm_password')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <input type="submit" value="Change Password">
</form>
</body>
</html>
