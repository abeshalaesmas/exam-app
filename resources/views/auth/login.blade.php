<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .text-danger { color: red; }
        .alert { padding: 10px; margin-bottom: 10px; }
        .alert-success { color: green; }
        .alert-fail { color: red; }
    </style>
</head>
<body>

<h1>LOGIN</h1>

    <form action="{{ route('loginUser') }}" method="post">
        @csrf

        <!-- Display success message -->
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        <!-- Display fail message -->
        @if (Session::has('fail'))
            <div class="alert alert-fail">{{ Session::get('fail') }}</div>
        @endif

        <div class="form-group">
            <label for="email">EMAIL</label>
            <input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{ old('email') }}">
            <!-- Display error for email -->
            <span class="text-danger">@error('email') {{ $message }} @enderror</span>
        </div>

        <div class="form-group">
            <label for="password">PASSWORD</label>
            <input type="password" class="form-control" placeholder="Enter Password" name="password">
            <!-- Display error for password -->
            <span class="text-danger">@error('password') {{ $message }} @enderror</span>
        </div>

        <div class="form-group">
            <button class="btn btn-block btn-primary" type="submit">LOGIN</button>
        </div>

        <a href="registration">New User? Register Here</a>
    </form>

</body>
</html>
