<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
</head>
<body>
    <h1>Searching for {{$search}}</h1>
    @if(!$errors->isEmpty())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    @if(isset($success))
        <div>{{$success}}</div>
    @endif
    <ul>
    @foreach($products as $product)
        <li>{{$product->getName()}} <br>
            Rating: {{$product->rating}}
            <br>
            <form action="{{route("user.add_product_to_cart")}}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->getId()}}">
                <input type="number" name="quantity" value="{{$product->getCartUsers()?->first()->quantity ?? 0}}" min="1" max="10">
                <button>Add to cart</button>
            </form>
        </li>
    @endforeach
    </ul>
    <h1>All categories</h1>
    <ul>
        <li>All
            <form action="{{route("user.search")}}" method="get">
                <input type="hidden" name="search" value="{{$search}}">
                <button>Select</button>
            </form>
        </li>
        @foreach($productTypes as $type)
            <li>{{$type->getName()}}
                <form action="{{route("user.search")}}" method="get">
                    <input type="hidden" name="search" value="{{$search}}">
                    <input type="hidden" name="product_type" value="{{$type->getId()}}">
                    <button>Select</button>
                </form>
            </li>
        @endforeach
    </ul>
    <form action="{{ route("user.search") }}" method="get">
        <input type="text" name="search" placeholder="Search" value="{{$search}}">
        @if($productType)
            <input type="hidden" name="product_type" value="{{$productType}}">
        @endif
        <button>Search</button>
    </form>
    <a href="{{route("user.home")}}">Dashboard</a>
</body>
</html>
