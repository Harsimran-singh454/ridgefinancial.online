@include('_partials.header')
<header>
    <title>New Admin</title>
</header>

<main>

    <div class="form-container">

        <form action="{{route('admcreate')}}" method="post">


            @if(Session::get('Success'))
            <p style="background-color:rgba(119, 255, 119, 0.578); padding:15px 10px">{{Session::get('Success')}}</p>
            @endif

            @if(Session::get('fail'))
            <p style="color: white; background-color:rgba(255, 0, 0, 0.512); padding:3em 0px;
                     display:flex; justify-content: center; margin: 10px auto;
                     border-radius:30px">{{Session::get('fail')}}</p>
            @endif


            @csrf
            <h1 style="margin:1em auto">Register Admin</h1>

            <div>
                <label for="name">Name : </label>
                <input type="text" name="name" required>
            </div>

            <div>
                <label for="email">E-mail : </label>
                <input type="text" name="email">
            </div>

            <div>
                <label for="password">Password : </label>
                <input type="password" name="password">
            </div>
            <input type="submit" class="submit-btn" value="Submit">
        </form>

    </div>

</main>




@include('_partials.footer')
