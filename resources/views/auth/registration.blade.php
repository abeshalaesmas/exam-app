<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Custom Authentication</title>
</head>
<body>
    <h1>REGISTRATION</h1>
    <form action="{{route('registerUser')}}" method="post">
        @csrf
        @if (Session::has('success'))
            <div class="alert alert-sucess">{{Session::get('success')}}</div>
        @endif
        @if (Session::has('fail'))
            <div class="alert alert-fail">{{Session::get('fail')}}</div>
        @endif
        <div class="form-group">
            <label for="name">NAME</label>
            <input type="text" class="form-control" placeholder="Enter Full Name" name="name" value="{{old('name')}}">
            <span class="text-danger">@error('name') {{$message}} @enderror()</span>
        </div>

        <div class="form-group">
            <label for="email">EMAIL</label>
            <input type="text" class="form-control" placeholder="Enter Full Name" name="email" value="{{old('email')}}">
            <span class="text-danger">@error('email') {{$message}} @enderror()</span>
        </div>

        <div class="form-group">
            <label for="password">PASSWORD</label>
            <input type="text" class="form-control" placeholder="Enter Password" name="password" value="">
            <span class="text-danger">@error('password') {{$message}} @enderror()</span>
        </div>
        <div class="form-group">
            <button class="btn btn-block btn-primary" type="submit">REGISTER</button>
        </div>
        <a href="login">Already have account!! Login Here</a>
    </form>
</body>
</html>