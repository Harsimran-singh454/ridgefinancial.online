@include('_partials.header')

<header>
    <title>Update Account</title>
</header>

<main>

    <div class="form-container">

        <form action="{{route('editscrcardprocc', $info->id)}}" method="post">


            @if(Session::get('Success'))
            <p style="background-color:rgba(119, 255, 119, 0.578); padding:15px 10px">{{Session::get('Success')}}</p>
            @endif

            @if(Session::get('fail'))
            <p style="color: white; background-color:rgba(255, 0, 0, 0.512); padding:3em 0px;
                     display:flex; justify-content: center; margin: 10px auto;
                     border-radius:30px">{{Session::get('fail')}}</p>
            @endif


            @csrf
            <h1 style="margin:1em auto">Update Secured Card</h1>

            <fieldset>
                <legend> Account Details</legend>
                <div>
                    <label for="name">Your Name : </label>
                    <input type="text" name="name" required value="{{$info->name}}" >
                    @error('name')**{{$message}}  @enderror
                </div>

                <div>
                    <label for="name_card">Name to appear on the card : </label>
                    <input type="text" name="name_card" required value="{{$info->name_card}}">
                    @error('name_card')**{{$message}}  @enderror
                </div>

                <div>
                    <label for="DOB">Date of Birth : </label>
                    <input type="date" name="DOB" step="any" value="{{$info->name}}">
                    @error('DOB')**{{$message}}  @enderror
                </div>

                <div>
                    <label for="marital_status">Marital Status : </label>
                    <select name="marital_status" required style="padding: 0.5em 1em;
                    width: 50%;
                    max-width: 100%;">
                           <option value="$info->marital_status">{{$info->marital_status}}</option>
                    </select>
                    @error('marital_status')**{{$message}}  @enderror
                </div>

                <div>
                    <label for="email">E-mail : </label>
                    <input type="email" name="email" value="{{$info->email}}">
                    @error('tot_lineOfCr')**{{$message}}  @enderror
                </div>

                <div>
                    <label for="phone">Phone Number : </label>
                    <input type="number" name="phone" value="{{$info->phone}}">
                    @error('tot_payments')**{{$message}}  @enderror
                </div>

                <div>
                    <label for="address">Address : </label>
                    <input type="text" name="address" value="{{$info->address}}">
                    @error('tot_payments_toDate')**{{$message}}  @enderror
                </div>

                <div>
                    <label for="mailing_address">Mailing Address : </label>
                    <input type="text" name="mailing_address" value="{{$info->mailing_address}}">
                    @error('mailing_address')**{{$message}}  @enderror
                </div>

                <h4 style="text-align: center">Optional Fields</h4>

                <div>
                    <label for="request_limit">Requested Limit : </label>
                    <input type="text" step="any" name="request_limit" value="{{$info->request_limit}}">
                </div>

                <fieldset>
                <legend>Transfer Balance (Optional)</legend>

                <div>

                    <label for="cred_card_inst">Credit Card Institution : </label>
                    <input type="number" step="any" name="cred_card_inst" value="{{$info->cred_card_inst}}">

                    <label for="transfer_amount">Transfer Amount : </label>
                    <input type="number" step="any" name="transfer_amount" value="{{$info->transfer_amount}}">

                    <label for="acc_number">Account Number : </label>
                    <input type="number" step="any" name="acc_number" value="{{$info->acc_number}}">

                </div>
                </fieldset>

            </fieldset>



            <fieldset>
                <legend> Account Details</legend>
            <div>
                <label for="account_number">Account Number : </label>
                <input type="number" name="account_number" required value="{{$info->account_number}}">
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
                <label for="authorizations">Authorizations : </label>
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
                <input type="date" name="cycle_date " value="{{$info->cycle_date}}">
                @error('cycle_date')**{{$message}}  @enderror
            </div>

            <div>
                <label for="transactions">Transactions : </label>
                <input type="number" name="transactions" value="{{$info->transactions}}">
                @error('transactions')**{{$message}}  @enderror
            </div>

            <div>
                <label for="card_number">Card Number : </label>
                <input type="number" name="card_number" value="{{$info->card_number}}">
                @error('card_number')**{{$message}}  @enderror
            </div>

            <div>
                <label for="pin_number">Pin Number : </label>
                <input type="number" name="pin_number" value="{{$info->pin_number}}">
                @error('pin_number')**{{$message}}  @enderror
            </div>
        </fieldset>

            <input type="submit" class="submit-btn" value="Submit">
        </form>

    </div>

</main>




@include('_partials.footer')
