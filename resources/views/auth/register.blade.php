<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

    <h1>Register</h1>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif

    <form action="{{ route('handleregister') }}" method="POST">

        @csrf

        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password">
        </div>

        <button type="submit">Register</button>

    </form>

    <a href="{{ route('login') }}">Already have an account?</a>

</body>
</html>