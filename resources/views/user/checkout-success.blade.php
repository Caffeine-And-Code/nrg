<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    @vite('/resources/js/themeManager.js')
    @vite('/resources/css/app.css') 
    @vite('/resources/css/responsive.css')
    @vite("/resources/css/main.css")
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    @vite("resources/css/components/ProductDisplayer.css")
    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs@gh-pages/qrcode.min.js"></script>
</head>
<body>
<h1>Payment success for order Number {{$order->getNumber()}}</h1>
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

<a href="{{route("user.profile")}}">Profile</a>
<x-single-order-displayer :order="$order" />
</body>

</html>
