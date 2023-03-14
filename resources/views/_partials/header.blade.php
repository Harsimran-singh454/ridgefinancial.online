<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/Style.css">

    <script src="/main.js"></script>

    <link rel="icon" type="/image/x-icon" href="./images/favicon.png">
    <title>Ridge Financial</title>
</head>
<body>
<header>
        @if(Session::has('LoggedUser'))
        <a href="{{route('Dashboard')}}"><img id="logo" src="/images/logo.png" width="200" style="margin: 1em;" alt=""></a>
        @elseif(Session::has('LoggedClient'))
        <a href="{{route('clientProfile')}}"><img id="logo" src="/images/logo.png" width="200" style="margin: 1em;" alt=""></a>
        @elseif(!Session::has('LoggedUser') && !Session::has('LoggedClient'))
        <a href=""><img id="logo" src="/images/logo.png" width="200" style="margin: 1em;" alt=""></a>

        @endif

<nav>
    <div>
        @if(Session::has('LoggedUser'))

        <a href="{{route('Dashboard')}}" style="text-decoration: none; color:black;"><img src="/images/home.svg.svg" alt=""></a>
        @elseif(Session::has('LoggedClient'))
        <a href="{{route('clientProfile')}}" style="text-decoration: none; color:black;"><img src="/images/home.svg.svg" alt=""></a>
        @endif

        {{-- <img id="nav-btn" src="./images/nav-btn.png" width="60" alt=""}}"> --}}
    </div>
    <ul class="drop-down-menu">
        <li></li>
    </ul>
</nav>
</header>

</body>
</html>
