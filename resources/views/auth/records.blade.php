<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
   <center> <h1>User Records</h1> </center>
   <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Gender</th>
        <th scope="col">Department</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($records as $records) 
      <tr>
        {{-- <th scope="row">1</th> --}}
        <td>{{$records->id}}</td>
        <td>{{$records->name}}</td>
        <td>{{$records->email}}</td>
        <td>{{$records->gender}}</td>
        <td>{{$records->department}}</td>
        <td><a href="update/{{$records->id}}"><button>Update</button></a></td>
        <td><a href="delete/{{$records->id}}"><button>Delete</button></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>