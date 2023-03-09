@include('_partials.header')

<header>
    <title>Update Account</title>
</header>

<main>

    <div class="form-container">

        <form action="{{route('editloanprocc', $info->id)}}" method="post">


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
                <input type="number" name="account_number" required value="{{$info->account_number}}">
                @error('account_number')**{{$message}}  @enderror
            </div>

            <div>
                <label for="account_balance">Account Balance : </label>
                <input type="number" name="account_balance" required step="any" value="{{$info->account_balance}}">
                @error('account_balance')**{{$message}}  @enderror
            </div>

            <div>
                <label for="due_date">Due Date : </label>
                <input type="date" name="due_date" required value="{{$info->due_date}}">
                @error('due_date')**{{$message}}  @enderror
            </div>

            <div>
                <label for="payment_amount">Payment Amount : </label>
                <input type="number" name="payment_amount" required step="any" value="{{$info->payment_amount}}">
                @error('payment_amount')**{{$message}}  @enderror
            </div>

            <div>
                <label for="frequency">Frequency : </label>
                <input type="number" name="frequency" required value="{{$info->frequency}}">
                @error('frequency')**{{$message}}  @enderror
            </div>

            <div>
                <label for="current_balance">Current Balance : </label>
                <input type="number" name="current_balance" required step="any" value="{{$info->current_balance}}">
                @error('current_balance')**{{$message}}  @enderror
            </div>

            <div>
                <label for="interest_rate">Interest Rate : </label>
                <input type="number" name="interest_rate" required step="any" value="{{$info->interest_rate}}">
                @error('interest_rate')**{{$message}}  @enderror
            </div>

            <div>
                <label for="term">Term : </label>
                <input type="text" name="term" required value="{{$info->term}}">
                @error('term')**{{$message}}  @enderror
            </div>

            <div>
                <label for="payment">Payment : </label>
                <input type="number" name="payment" required step="any" value="{{$info->payment}}">
                @error('payment')**{{$message}}  @enderror
            </div>


            <input type="submit" class="submit-btn" value="Submit">
        </form>
        <a href="{{route('deleteLoan', $info->id)}}" style="background-color: rgba(237, 36, 36, 0.701); text-decoration:none; color:white; padding: 1%;">Delete</a>

    </div>

</main>




@include('_partials.footer')
