<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h1>Login</h1>

    @if(Session::has('msg'))
        <p>{{ Session::get('msg') }}</p>
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif

    <form action="{{ route('handlelogin') }}" method="POST">

        @csrf

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password">
        </div>

        <button type="submit">Login</button>

    </form>

    <a href="{{ route('register') }}">Create Account</a>

</body>
</html>