<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
</head>
<body>
@if(!$errors->isEmpty())
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
@endif
<form action="{{route("user.create_user")}}" method="post">
    @csrf
    <input type="email" name="email" placeholder="email" required/>
    <input type="text" name="username" placeholder="username" required />
    <input type="password" name="password" placeholder="password" required />
    <input type="password" name="password_confirmation" placeholder="password confirmation" required />
    <button>Send</button>
</form>
    <a href="{{route('user.login')}}">
        <button type="button">Login</button>
    </a>
</body>
</html>
