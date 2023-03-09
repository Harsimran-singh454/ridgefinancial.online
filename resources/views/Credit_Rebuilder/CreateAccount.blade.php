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
            <h1 style="margin:1em auto; text-align:center">New Credit Rebuilder Account</h1>

            <div>
                <label for="account_number">Account Number : </label>
                <input type="number" name="account_number" required value="{{old('account_number')}}" >
                @error('account_number')**{{$message}}  @enderror
            </div>

            <div>
                <label for="client_id">Client : </label>
                <select name="client_id" required style="padding: 0.5em 1em;
                width: 60%;
                max-width: 100%;">
                    @foreach($clients as $client)
                       <option value="{{$client->id}}">{{$client->name}}</option>
                    @endforeach
                </select>
                @error('client_id'){{$message}}  @enderror
            </div>

            <div>
                <label for="monthly_fee">Monthly Fee : </label>
                <input type="number" name="monthly_fee" step="any" value="{{old('monthly_fee')}}">
                @error('monthly_fee')**{{$message}}  @enderror
            </div>

            <div>
                <label for="amount_saved">Amount Saved : </label>
                <input type="number" name="amount_saved" step="any" value="{{old('amount_saved')}}">
                @error('amount_saved')**{{$message}}  @enderror
            </div>

            <div>
                <label for="tot_lineOfCr">Total Line of Credit : </label>
                <input type="number" name="tot_lineOfCr" step="any" value="{{old('tot_lineOfCr')}}">
                @error('tot_lineOfCr')**{{$message}}  @enderror
            </div>

            <div>
                <label for="tot_payments">Total Payments : </label>
                <input type="number" name="tot_payments" value="{{old('tot_payments')}}">
                @error('tot_payments')**{{$message}}  @enderror
            </div>

            <div>
                <label for="tot_payments_toDate">Total Payments to Date : </label>
                <input type="number" name="tot_payments_toDate" value="{{old('tot_payments_toDate')}}">
                @error('tot_payments_toDate')**{{$message}}  @enderror
            </div>

            <div>
                <label for="due_date">Due date : </label>
                <input type="date" name="due_date" value="{{old('due_date')}}">
                @error('due_date')**{{$message}}  @enderror
            </div>


            <input type="submit" class="submit-btn" value="Submit">
        </form>

    </div>

</main>




@include('_partials.footer')
