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
        <li>{{$order->getNumber()}} | € {{$order->getTotal()}} | <a href="{{route('user.order_details', ['order_id' => $order->getId()])}}">View</a>
        </li>
    @endforeach
    </ul>

    <p>Fidelity Meter</p>
    <p>Actual Spent: {{$actualSpent}}</p>
    <p>Fidelity Meter target: {{$fmTarget}}</p>

    <p>Your profile</p>
    <form action="{{route('user.profile_edit')}}" method="post">
        @csrf
        <input type="text" value="{{$user->getUsername()}}" name="username" placeholder="username">
        <input type="email" value="{{$user->getEmail()}}" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <input type="password" name="password_confirmation" placeholder="password confirmation">
        <button>Edit</button>
    </form>

    <a href="{{route('user.home')}}">Dashboard</a>
</body>
</html>
