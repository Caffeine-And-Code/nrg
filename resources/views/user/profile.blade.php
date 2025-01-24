<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @vite('/resources/js/themeManager.js')
    @vite('/resources/css/app.css') @vite('/resources/css/responsive.css')
    @vite("/resources/css/main.css")
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
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
    <p>Actual Spent: {{$user->getTotalSpent()}}</p>
    <p>Fidelity Meter target: {{$fmTarget}}</p>
    <p>Your discount portfolio: {{$user->getDiscountPortfolio()}}</p>

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
    <x-site-setting />
</body>
</html>
