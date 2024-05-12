<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="css/styles.css"> --}}
    <title>Update Information Form</title>
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
    background-color: #4caf50;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}
.text-danger {
    color: red;
}
.text-ok {
    color: rgb(0, 250, 25);
}
    </style>

    <form action="{{url('update_data',$data->id)}}" method="post">
        @if (Session::has('success'))
            <div class="text-ok">{{Session::get('success')}}</div>
        @endif
        @if (Session::has('fail'))
        <div class="text-danger">{{Session::get('fail')}}</div>
        @endif
        @csrf
        <h2>Update Information Form</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{$data->name}}">
        <span class="text-danger">@error('name'){{$message}} @enderror</span>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{$data->email}}">
        <span class="text-danger">@error('email'){{$message}} @enderror</span>

        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender" value="{{$data->gender}}">
        <span class="text-danger">@error('gender'){{$message}} @enderror</span>

        <label for="department">Department:</label>
        <input type="text" id="department" name="department" value="{{$data->department}}">
        <span class="text-danger">@error('department'){{$message}} @enderror</span>

        <input type="submit" value="Register">
    </form>

</body>
</html>
