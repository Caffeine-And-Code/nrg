<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
</head>
<body>
    <h1>Your dashboard</h1>
    @if(!$errors->isEmpty())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{ route("user.search") }}" method="get">
        <input type="text" name="search" placeholder="Search">
        <button>Search</button>
    </form>
    <h2>Latest News</h2>
    <ul>
        @foreach($news as $new)
            <li>{{$new->getImagePath()}}</li>
        @endforeach
    </ul>

    <h2>Best buy products</h2>
    <ul>
    @foreach($products as $product)
        <li>{{ $product->getName() }} | € {{$product->getPrice()}}</li>
    @endforeach
    </ul>

    <h2>Bottom bar</h2>
    <ul>
        <li><a href="{{route("user.checkout")}}">checkout</a><br></li>
        <li><a href="{{route("user.profile")}}">profile</a></li>
        <li><a href="{{route("user.notification")}}">notification</a></li>
    </ul>
    <form action="{{ route("user.logout") }}" method="post">
        @csrf
        <button>Logout</button>
    </form>
</body>
</html>
