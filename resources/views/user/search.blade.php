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
    <ul>
    @foreach($products as $product)
        <li>{{$product->getName()}}
            <form action="{{route("user.add_product_to_cart")}}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->getId()}}">
                <button>Add to cart</button>
            </form>
        </li>
    @endforeach
    </ul>
    <h1>All categories</h1>
    <ul>
        @foreach($productTypes as $type)
            <li>{{$type->getName()}}</li>
        @endforeach
    </ul>
    <form action="{{ route("user.search") }}" method="get">
        <input type="text" name="search" placeholder="Search">
        <button>Search</button>
    </form>
    <a href="{{route("user.home")}}">Dashboard</a>
</body>
</html>
