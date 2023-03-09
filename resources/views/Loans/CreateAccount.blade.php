@include('_partials.header')

<header>
    <title> Create Loan Account </title>
</header>


<main>

    <div class="form-container">

        <form action="{{route('newLoanAcc')}}" method="post">


            @if(Session::get('Success'))
            <p style="background-color:rgba(119, 255, 119, 0.578); padding:15px 10px">{{Session::get('Success')}}</p>
            @endif

            @if(Session::get('fail'))
            <p style="color: white; background-color:rgba(255, 0, 0, 0.512); padding:3em 0px;
                     display:flex; justify-content: center; margin: 10px auto;
                     border-radius:30px">{{Session::get('fail')}}</p>
            @endif


            @csrf
            <h1 style="margin:1em auto">New Loan Account</h1>

            <div>
                <label for="account_number">Account : </label>
                <input type="number" name="account_number" required>
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
                <label for="account_balance">Account Balance : </label>
                <input type="number" name="account_balance" required step="any">
                @error('account_balance')**{{$message}}  @enderror
            </div>

            <div>
                <label for="due_date">Due Date : </label>
                <input type="date" name="due_date" required>
                @error('due_date')**{{$message}}  @enderror
            </div>

            <div>
                <label for="payment_amount">Payment Amount : </label>
                <input type="number" name="payment_amount" required step="any">
                @error('payment_amount')**{{$message}}  @enderror
            </div>

            <div>
                <label for="frequency">Frequency : </label>
                <input type="number" name="frequency" required>
                @error('frequency')**{{$message}}  @enderror
            </div>

            <div>
                <label for="current_balance">Current Balance : </label>
                <input type="number" name="current_balance" required step="any">
                @error('current_balance')**{{$message}}  @enderror
            </div>

            <div>
                <label for="interest_rate">Interest Rate : </label>
                <input type="number" name="interest_rate" required step="any">
                @error('interest_rate')**{{$message}}  @enderror
            </div>

            <div>
                <label for="term">Term : </label>
                <input type="text" name="term" required>
                @error('term')**{{$message}}  @enderror
            </div>

            <div>
                <label for="payment">Payment : </label>
                <input type="number" name="payment" required step="any">
                @error('payment')**{{$message}}  @enderror
            </div>


            <input type="submit" class="submit-btn" value="Submit">
        </form>

    </div>

</main>




@include('_partials.footer')
