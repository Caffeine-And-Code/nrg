<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
</head>
<body>
    <h1>Congratulations: here are the dashboard</h1>
    @if(!$errors->isEmpty())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{ route("user.search") }}" method="get">
        <input type="text" name="search" placeholder="Search">
        <button>Search</button>
    </form>
    <a href="{{route("user.checkout")}}">Go to checkout</a><br>
    <a href="{{route("user.profile")}}">Go to profile</a>
    <form action="{{ route("user.logout") }}" method="post">
        @csrf
        <button>Logout</button>
    </form>
</body>
</html>
