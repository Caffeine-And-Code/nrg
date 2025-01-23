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
        @if (array_key_exists("title", $notification->data) && array_key_exists("message", $notification->data))
            <li>
                @if ($notification->unread())
                    <b>{{$notification->data["title"]}}</b><br>
                @else
                    <p>{{$notification->data["title"]}}</p><br>
                @endif

                <p>{{$notification->data["message"]}}</p>
                <form action="{{route("user.notification_read")}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$notification->id}}"/>
                    <button>read</button>
                </form>
            </li>
            @endif
    @endforeach

    </ul>
    <a href="{{route("admin.dashboard")}}">dashboard</a>
</body>
</html>
