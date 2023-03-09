@include('_partials.header')

<header>
    <title>Update Account</title>
</header>

<main>

    <div class="form-container">

        <form action="{{route('editlineocrprocc', $info->id)}}" method="post">


            @if(Session::get('Success'))
            <p style="background-color:rgba(119, 255, 119, 0.578); padding:15px 10px">{{Session::get('Success')}}</p>
            @endif

            @if(Session::get('fail'))
            <p style="color: white; background-color:rgba(255, 0, 0, 0.512); padding:3em 0px;
                     display:flex; justify-content: center; margin: 10px auto;
                     border-radius:30px">{{Session::get('fail')}}</p>
            @endif


            @csrf
            <h1 style="margin:1em auto">New Line Of Credit Account</h1>

            <div>
                <label for="account_number">Account Number : </label>
                <input type="number" name="account_number" required value="{{$info->account_number}}">
                @error('account_number')**{{$message}}  @enderror
            </div>

            <div>
                <label for="credit_limit">Credit Limit : </label>
                <input type="number" name="credit_limit" step="any" value="{{$info->credit_limit}}">
                @error('credit_limit')**{{$message}}  @enderror
            </div>

            <div>
                <label for="current_balance">Current Balance : </label>
                <input type="number" name="current_balance" step="any" value="{{$info->current_balance}}">
                @error('current_balance')**{{$message}}  @enderror
            </div>

            <div>
                <label for="authorizations">Authorizations : </label >
                <input type="number" name="authorizations" value="{{$info->authorizations}}">
                @error('authorizations')**{{$message}}  @enderror
            </div>

            <div>
                <label for="credit_remaining">Credit Remaining : </label>
                <input type="number" name="credit_remaining" step="any" value="{{$info->credit_remaining}}">
                @error('credit_remaining')**{{$message}}  @enderror
            </div>

            <div>
                <label for="due_date">Due Date : </label>
                <input type="date" name="due_date" value="{{$info->due_date}}">
                @error('due_date')**{{$message}}  @enderror
            </div>

            <div>
                <label for="cycle_date">Cycle Date : </label>
                <input type="date" name="cycle_date" value="{{$info->cycle_date}}">
                @error('cycle_date')**{{$message}}  @enderror
            </div>


            <input type="submit" class="submit-btn" value="Submit">
        </form>

<a href="{{route('deleteLoc', $info->id)}}" style="background-color: rgba(237, 36, 36, 0.701); text-decoration:none; color:white; padding: 1%;">Delete</a>


    </div>

</main>




@include('_partials.footer')
