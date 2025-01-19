<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
</head>
<body>
    <h1>Checkout</h1>
    @if(!$errors->isEmpty())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    @if(isset($success))
        <div>{{$success}}</div>
    @endif
    @foreach($products as $product)
        <li>{{$product->getName()}} | {{$product->getCartUsers()->first()->quantity}}
            <form action="{{route("user.add_product_to_cart")}}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->getId()}}">
                <input type="hidden" name="quantity" value="0">
                <button>Remove</button>
            </form>
        </li>
    @endforeach
    <div>Shipping: €{{$shippingCost}}</div>
    <div>Price: €{{$total}}</div>
    <form action="{{route("user.post_checkout")}}" method="post">
        @csrf
        <select name="classroom_id">
            @foreach($classrooms as $classroom)
                <option value="{{$classroom->id}}">{{$classroom->name}}</option>
            @endforeach
        </select>
        <input type="datetime-local" name="delivery_time">
        <button>Pay</button>
    </form>
    <a href="{{route("user.home")}}">Dashboard</a>
</body>
</html>
