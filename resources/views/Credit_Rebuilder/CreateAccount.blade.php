@include('_partials.header')

<header>
    <title>New Account</title>
</header>

<main>

    <div class="form-container">

        <form action="{{route('NewCreditBuilderAccount')}}" method="post">


            @if(Session::get('Success'))
            <p style="background-color:rgba(119, 255, 119, 0.578); padding:15px 10px">{{Session::get('Success')}}</p>
            @endif

            @if(Session::get('fail'))
            <p style="color: white; background-color:rgba(255, 0, 0, 0.512); padding:3em 0px;
                     display:flex; justify-content: center; margin: 10px auto;
                     border-radius:30px">{{Session::get('fail')}}</p>
            @endif

            @csrf
            <h1 style="margin:1em auto; text-align:center">Request Credit Rebuilder Account</h1>

            <div>
                <label for="name">Your Name : </label>
                <input type="text" name="name" required value="{{old('name')}}" >
                @error('name')**{{$message}}  @enderror
            </div>

            <div>
                <label for="name_card">Name to appear on the card : </label>
                <input type="text" name="name_card" required value="{{old('name_card')}}" >
                @error('name_card')**{{$message}}  @enderror
            </div>

            <div>
                <label for="gender">Gender : </label>
                <select name="gender" required style="padding: 0.5em 1em;
                width: 60%;
                max-width: 100%;">
                       <option value="">--Select--</option>
                       <option value="male">Male</option>
                       <option value="female">Female</option>
                </select>
                @error('gender'){{$message}}  @enderror
            </div>

            <div>
                <label for="DOB">Date of Birth : </label>
                <input type="date" name="DOB" step="any" value="{{old('DOB')}}">
                @error('DOB')**{{$message}}  @enderror
            </div>

            <div>
                <label for="marital_status">Marital Status : </label>
                <select name="marital_status" required style="padding: 0.5em 1em;
                width: 60%;
                max-width: 100%;">
                       <option value="">--Select--</option>
                       <option value="single">Single</option>
                       <option value="married">Married</option>
                       <option value="divorced">Divorced</option>
                       <option value="widow(er)">Widow(er)</option>
                </select>
                @error('marital_status')**{{$message}}  @enderror
            </div>

            <div>
                <label for="email">E-mail : </label>
                <input type="email" name="email" value="{{old('email')}}">
                @error('tot_lineOfCr')**{{$message}}  @enderror
            </div>

            <div>
                <label for="phone">Phone Number : </label>
                <input type="number" name="phone" value="{{old('tot_payments')}}">
                @error('tot_payments')**{{$message}}  @enderror
            </div>

            <div>
                <label for="address">Address : </label>
                <input type="number" name="tot_payments_toDate" value="{{old('tot_payments_toDate')}}">
                @error('tot_payments_toDate')**{{$message}}  @enderror
            </div>

            <div>
                <label for="mailing_address">Mailing Address : </label>
                <input type="text" name="mailing_address" value="{{old('mailing_address')}}">
                @error('mailing_address')**{{$message}}  @enderror
            </div>

            <h4 style="text-align: center">Optional Fields</h4>

            <div>
                <label for="request_limit">Requested Limit : </label>
                <input type="number" step="any" name="request_limit" value="{{old('request_limit')}}">
            </div>

            <div>
                <label for="request_limit">Requested Limit : </label>
                <input type="number" step="any" name="request_limit" value="{{old('request_limit')}}">
            </div>


            <input type="submit" class="submit-btn" value="Submit">
        </form>

    </div>

</main>




@include('_partials.footer')
