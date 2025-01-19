<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
</head>
<body>
    <h1>Congratulations: here are the dashboard</h1>
    <form action="{{ route("user.logout") }}" method="post">
        @csrf
        <button>Logout</button>
    </form>
</body>
</html>
