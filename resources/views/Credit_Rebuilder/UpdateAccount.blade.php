@include('_partials.header')

<header>
    <title>Update Credit Rebuilder </title>
</header>

<main>

    <div class="form-container">

        <form action="{{route('editcardrbprocc', $info->id)}}" method="post">


            @if(Session::get('Success'))
            <p style="background-color:rgba(119, 255, 119, 0.578); padding:15px 10px">{{Session::get('Success')}}</p>
            @endif

            @if(Session::get('fail'))
            <p style="color: white; background-color:rgba(255, 0, 0, 0.512); padding:3em 0px;
                     display:flex; justify-content: center; margin: 10px auto;
                     border-radius:30px">{{Session::get('fail')}}</p>
            @endif


            @csrf
            <h1 style="margin:1em auto; text-align:center" >Update Credit Rebuilder Account</h1>

            <fieldset>

                <legend>Client's Details</legend>



            <div>
                <label for="title">Title : </label>
                <input type="text" name="title" required value="{{$info->title}}">
            </div>

            <div>
                <label for="name">Name : </label>
                <input type="text" name="name" required value="{{$info->name}}">
            </div>

            <div>
                <label for="DOB">Date of Birth : </label>
                <input type="date" name="DOB" required value="{{$info->DOB}}">
            </div>

            <div>
                <label for="email">Email : </label>
                <input type="text" name="email" required value="{{$info->email}}">
            </div>

            <div>
                <label for="phone">Phone number : </label>
                <input type="text" name="phone" required value="{{$info->phone}}">
            </div>

            <div>
                <label for="address">Address : </label>
                <input type="text" name="address" required value="{{$info->address}}">
            </div>

            <div>
                <label for="term">Term : </label>
                <input type="text" name="term" required value="{{$info->term}}">
            </div>
        </fieldset>


        <fieldset>

            <legend>Account Details</legend>
            <div>
                <label for="account_number">Account Number : </label>
                <input type="number" name="account_number" required value="{{$info->account_number}}" >
                @error('account_number')**{{$message}}  @enderror
            </div>

            <div>
                <label for="client_id">Client : </label>
                <select name="client_id" required style="padding: 0.5em 1em;
                width: 60%;
                max-width: 100%;">

                       <option value="{{$info->id}}">{{$info->name}}</option>

                </select>
                @error('client_id'){{$message}}  @enderror
            </div>

            <div>
                <label for="monthly_fee">Monthly Fee : </label>
                <input type="number" name="monthly_fee" step="any" value="{{$info->monthly_fee}}">
                @error('monthly_fee')**{{$message}}  @enderror
            </div>

            <div>
                <label for="amount_saved">Amount Saved : </label>
                <input type="number" name="amount_saved" step="any" value="{{$info->amount_saved}}">
                @error('amount_saved')**{{$message}}  @enderror
            </div>

            <div>
                <label for="tot_lineOfCr">Total Line of Credit : </label>
                <input type="number" name="tot_lineOfCr" step="any" value="{{$info->tot_lineOfCr}}">
                @error('tot_lineOfCr')**{{$message}}  @enderror
            </div>

            <div>
                <label for="tot_payments">Total Payments : </label>
                <input type="number" name="tot_payments" value="{{$info->tot_payments}}">
                @error('tot_payments')**{{$message}}  @enderror
            </div>
{{--
            <div>
                <label for="term">Total Payments to Date : </label>
                <input type="number" name="term" value="{{$info->id}}">
                @error('term')**{{$message}}  @enderror
            </div> --}}

            <div>
                <label for="due_date">Due date : </label>
                <input type="date" name="due_date" value="{{$info->due_date}}">
                @error('due_date')**{{$message}}  @enderror
            </div>

        </fieldset>

            <input type="submit" class="submit-btn" value="Submit">
        </form>

    </div>

</main>




@include('_partials.footer')
