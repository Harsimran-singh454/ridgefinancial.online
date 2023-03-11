@include('_partials.header')

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
            <h1 style="margin:1em auto">Update Line Of Credit Account</h1>

            <fieldset>
                <legend>Clients Information</legend>
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
                <input type="number" name="phone" required value="{{$info->phone}}">
            </div>

            <div>
                <label for="work_number">Work Number : </label>
                <input type="number" name="work_number" required value="{{$info->work_number}}">
            </div>

            <div>
                <label for="address">Address : </label>
                <input type="text" name="address" required value="{{$info->address}}">
            </div>

            <div>
                <label for="request_amount">Request Amount : </label>
                <input type="number" name="request_amount" required step="any" value="{{$info->request_amount}}">
            </div>

            <div>
                <label for="username">Username : </label>
                <input type="text" name="username" required value="{{$info->username}}">
            </div>
        </fieldset>



        <fieldset>
              <legend>Account Details</legend>

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
                <input type="date" name="cycle_date" value="{{$info->cycle_date}}">
                @error('cycle_date')**{{$message}}  @enderror
            </div>

        </fieldset>

            <input type="submit" class="submit-btn" value="Submit">
        </form>

    </div>

</main>




@include('_partials.footer')
