@include('_partials.header')

<header>
    <title>New Client</title>
</header>


<main>

    <div class="form-container">

        <form action="{{route('createClient')}}" method="post">


            @if(Session::get('Success'))
            <p style="background-color:rgba(119, 255, 119, 0.578); padding:15px 10px">{{Session::get('Success')}}</p>
            @endif

            @if(Session::get('fail'))
            <p style="color: white; background-color:rgba(255, 0, 0, 0.512); padding:3em 0px;
                     display:flex; justify-content: center; margin: 10px auto;
                     border-radius:30px">{{Session::get('fail')}}</p>
            @endif


            @csrf
            <h1 style="margin:1em auto">Add Client</h1>

            <div>
                <label for="name">Name : </label>
                <input type="text" name="name" required>
            </div>
            @error('name')**{{$message}}  @enderror

            <div>
                <label for="email">E-mail : </label>
                <input type="email" name="email">
            </div>
            @error('email')**{{$message}}  @enderror


            <div>
                <label for="address">Address : </label>
                <input type="text" name="address">
            </div>
            @error('address')**{{$message}}  @enderror

            <div>
                <label for="contact">Phone Number : </label>
                <input type="number" name="contact">
            </div>
            @error('contact')**{{$message}}  @enderror

            <div>
                <label for="DOB">Date Of Birth : </label>
                <input type="date" name="DOB">
            </div>
            @error('DOB')**{{$message}}  @enderror

            <div>
                <label for="pin">Support Pin : </label>
                <input type="number" maxlength=4 name="pin">
            </div>
            @error('pin')**{{$message}}  @enderror

            <div>
                <label for="password">Password : </label>
                <input type="password" name="password">
            </div>
            @error('password')**{{$message}}  @enderror

            <input type="submit" class="submit-btn" value="Submit">
        </form>

    </div>

</main>




@include('_partials.footer')
