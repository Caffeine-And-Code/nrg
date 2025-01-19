<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
</head>
<body>
    <h1>Congratulations: Checkout complete</h1>
    @if(!$errors->isEmpty())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <div>Your order number is {{$order->getNumber()}}</div>
    <div>Cost: € {{$order->getTotal()}}</div>
    <a href="{{route("user.home")}}">Dashboard</a>
</body>
</html>
