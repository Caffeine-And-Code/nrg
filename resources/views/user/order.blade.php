<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
</head>
<body>
    <h1>Order Number {{$order->getNumber()}}</h1>
    @if(!$errors->isEmpty())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    @if(isset($success))
        <div>{{$success}}</div>
    @endif
    <ul>
    @foreach($order->products as $product)
        <li>{{$product->getName()}} | € {{$product->pivot->bought_price}} | qt. {{$product->pivot->quantity}}</li>
    @endforeach
    </ul>
    <p>Total: {{$order->getTotal()}}</p>
    <p>Class: {{$order->classroom->name}}</p>
    @if($order->getStatus() === 0)
        <p>In waiting</p>
    @elseif($order->getStatus() == 1)
        <p>paid</p>
    @else
        <p>cancelled</p>
    @endif

    <a href="{{route("user.profile")}}">Profile</a>
</body>
</html>
