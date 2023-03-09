<head>
    @include('/_partials/header')
    <title>{{$client->name}}'s Account</title>
</head>


    <body>
        <div class="form-container">
            <h1 style="text-align: center;">{{$client->name}}'s Details</h1>

            <form class="acc-form" action="{{ route('editprocc', $client->id)}}" method="POST">
                @csrf

                <h1 style="margin:1em auto">Update Client</h1>

            <div>
                <label for="name">Name : </label>
                <input type="text" name="name"  value="{{$client->name}}">
            </div>
            @error('name')**{{$message}}  @enderror

            <div>
                <label for="email">E-mail : </label>
                <input type="email" name="email" value="{{$client->email}}">
            </div>
            @error('email')**{{$message}}  @enderror


            <div>
                <label for="address">Address : </label>
                <input type="text" name="address" value="{{$client->address}}">
            </div>
            @error('address')**{{$message}}  @enderror

            <div>
                <label for="contact">Phone Number : </label>
                <input type="number" name="contact" value="{{$client->contact}}">
            </div>
            @error('contact')**{{$message}}  @enderror

            <div>
                <label for="DOB">Date Of Birth : </label>
                <input type="date" name="DOB" value="{{$client->DOB}}">
            </div>
            @error('DOB')**{{$message}}  @enderror

            <div>
                <label for="pin">Support Pin : </label>
                <input type="number" maxlength=4 name="pin" value="{{$client->pin}}">
            </div>
            @error('pin')**{{$message}}  @enderror

            <div>
                <label for="password">Password : </label>
                <input type="password" name="password" value="{{$client->password}}">
            </div>
            @error('password')**{{$message}}  @enderror

            <input type="submit" class="submit-btn" value="Submit">


            </form>

<a href="{{route('deleteClient', $client->id)}}" style="background-color: rgba(237, 36, 36, 0.701); text-decoration:none; color:white; padding: 1%;">Delete</a>

            @foreach ($errors->all() as $error)
                {{ $error }}
                @endforeach

        </div>
    </body>
    @include("_partials.footer")
