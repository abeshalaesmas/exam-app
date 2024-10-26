<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>



    <h1>Welcome to Dashboard</h1>
   
    <table>
        <thead>
           <th>Name</th>
           <th>Email</th>
           <th>Action</th>
        </thead>
        <tbody>
            
            <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td><a href="logout">Logout</a></td>
            </tr>
            <form action="{{route('notes.index')}}" method="GET">
                @csrf
                <button type="submit">STARTED</button>
            </form>
            
        </tbody>
    </table>


</body>
</html>