<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
</head>
<body>
    <h1>Your notification</h1>
    @if(!$errors->isEmpty())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    @if(isset($success))
        <div>{{$success}}</div>
    @endif
    <ul>
    @foreach($notifications as $notification)
        <li>
            <b>{{$notification->getTitle()}}</b><br>
            <p>{{$notification->getDescription()}}</p>
        </li>
    @endforeach

    </ul>
    <a href="{{route("user.home")}}">dashboard</a>
</body>
</html>
