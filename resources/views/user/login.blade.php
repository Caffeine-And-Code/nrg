<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
</head>
<body>
    @if(!$errors->isEmpty())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{route("user.authenticate")}}" method="post">
        @csrf
        <input type="text" name="username" placeholder="username or email" />
        <input type="password" name="password" placeholder="password" />
        <button>send</button>
    </form>
    <a href="{{route('user.register')}}">register</a>
</body>
</html>
