<head>
    @include('_partials/header')
    <title>Edit Admin</title>
    <head>

    <body>
        <div class="form-container">

            <form action="{{ route('updateAdmin', $Admin->id)}}" method="POST">

            @if(Session::get('Success'))
            <p style="background-color:rgba(119, 255, 119, 0.578); padding:15px 10px">{{Session::get('Success')}}</p>
            @endif

            @if(Session::get('Fail'))
            <p style="color: white; background-color:rgba(255, 0, 0, 0.512); padding:3em 0px;
            display:flex; justify-content: center; margin: 10px auto;
            border-radius:30px">{{Session::get('Fail')}}</p>
            @endif

            @csrf
            <h1>Edit {{$Admin->name}}</h1>

                <div>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" value="{{$Admin->name}}">
                    @error('name')**{{$message}}  @enderror
                </div>


                <div>
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" value="{{$Admin->email}}">
                </div>
                    @error('email')**{{$message}}  @enderror

                <div>
                    <label for="role">Role:</label>
                    <select required style="margin:2%;
                                    padding:2%;
                                    width:60%;
                                    border: 0.1px solid black;
                                    "
                                    id="account_number" name="role" value="{{$Admin->role}}">

                            <option value="level1">Admin L1</option>
                            <option value="">Admin L2</option>
                    </select>
                </div>

                <div>
                    <label for="password"> Password: </label>
                    <input type="password" name="password" id="password" value="{{$Admin->password}}">
                </div>


                <div class="status">
                        <h3>Status:</h3>
                        <label class="switch">
                            <input type="checkbox" name="status" value="active" checked>
                            <span class="slider round"></span>
                        </label>
                </div>

                    <input class="submit-btn" value="Save" type="submit">

            </form>
        </div>
    </body>
    @include("_partials.footer")
