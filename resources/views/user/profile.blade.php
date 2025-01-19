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
    @if(isset($success))
        <div>{{$success}}</div>
    @endif

    <h1>Your profile</h1>
    <p>Your last orders</p>
    <ul>
    @foreach($orders as $order)
        <li>{{$order->getNumber()}} | {{$order->getTotal()}}</li>
    @endforeach
    </ul>

    <p>Your profile</p>
    <form action="{{route('user.logout')}}" method="post">
        @csrf
        <input type="text" value="{{$user->getUsername()}}" name="username" placeholder="username">
        <input type="email" value="{{$user->getEmail()}}" name="email" placeholder="email">
        <button>Edit</button>
    </form>

    <a href="{{route('user.home')}}">Dashboard</a>
</body>
</html>
