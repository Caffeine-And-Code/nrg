<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{__("main.account")}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    <link
            rel="stylesheet"
            href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"
        />
    @vite('/resources/css/colors.css')
    @vite('/resources/css/main.css')
    @vite('/resources/css/app.css')
    @vite('/resources/js/themeManager.js')
    @vite('/resources/css/responsive.css')
</head>
<body>
    <x-nav-bar title="Account"/>
    <main class="main container">
    
        <x-user-account-mobile :orders="$orders" :user="$user" :fmTarget="$fmTarget" :fmPrize="$fmPrize"/>

        {{-- <p>Fidelity Meter</p>
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
        </form> --}}

        
        <x-site-setting/>
    </main>
    <x-navigation-footer mode="client"/>
</body>
</html>
