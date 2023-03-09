@include('./_partials/header')
<header>
    <title>Client Login</title>
</header>

<main>


    <div class="form-container">


        <form action="{{ route('loggingclient') }}" method="post">

            @if(Session::get('Success'))
            <p style="background-color:rgba(119, 255, 119, 0.578); padding:15px 10px">{{Session::get('Success')}}</p>
            @endif

            @if(Session::get('fail'))
            <p style="color: white; background-color:rgba(255, 0, 0, 0.512); padding:2em 1em;
                     display:flex; justify-content: center; margin: 10px auto;
                     border-radius:30px">{{Session::get('fail')}}</p>
            @endif

            @csrf
            <h1 style="text-align:center">Self Serve Login</h1>
            <div>
                <label for="email">E-mail : </label>
                <input type="text" name="email" required>
            </div>

            <div>
                <label for="password">password : </label>
                <input type="password" name="password" required>
            </div>

            <input type="submit" value="Log in" class="submit-btn">
        </form>

    </div>

</main>


@include('_partials.footer')
