<head>
    @include('/_partials/header')
    <title>Change Password</title>
</head>
<body>

    <div class="form-container">

        <h1>Change Your Password</h1>

        <form action="{{ route('changePasswordA', $data['id']) }}" method="POST" name="changePwd">

            @if(Session::get('Success'))
            <p style="background-color:lightgreen; padding:10px">{{Session::get('Success')}}</p>
            @endif

            @if(Session::get('fail'))
            <p style="background-color:red; padding:10px">{{Session::get('fail')}}</p>
            @endif

            @csrf
                <div>

                    <label for="password"> Password: </label>
                    <input type="password" name="password" id="password" required>
                    @error('password')**{{$message}}@enderror

                </div>

                <div>

                    <label for="confirm_password"> Confirm Your Password: </label>
                    <input type="password" name="confirm_password" id="confirm_password" required>
                    @error('confirm_password')**{{$message}}@enderror

                </div>

                    <input value="Login" type="submit" class="submit-btn">

        </form>

    </div>
    {{-- </form> --}}

<script>


var changepwd = document.forms.changepwd();
    changepwd.addEventListener('onsubmit',processData);

    function processData(){
        alert("Pressed");
    }


</script>
</body>
