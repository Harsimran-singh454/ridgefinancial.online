@include('_partials.header')

<header>
    <title>Transfer Money</title>
</header>

<main>

    <div class="form-container">

        <form action="{{route('newMoneyTransfer')}}" method="post" name="moneytform">


            @if(Session::get('Success'))
            <p style="background-color:rgba(119, 255, 119, 0.578); padding:15px 10px">{{Session::get('Success')}}</p>
            @endif

            @if(Session::get('fail'))
            <p style="color: white; background-color:rgba(255, 0, 0, 0.512); padding:3em 0px;
                     display:flex; justify-content: center; margin: 10px auto;
                     border-radius:30px">{{Session::get('fail')}}</p>
            @endif


            @csrf
            <h1 style="margin:1em auto">Money Transfer</h1>

            <div>
                <label for="sender">Sender : </label>
                <input type="text" name="sender" required>
                @error('sender')**{{$message}}  @enderror

            </div>

            <div>

                <label for="client_id">Select Account : </label>

                <select name="client_id" required >
                   <option value="{{$client->id}}">{{$client->name}}</option>

                </select>

                @error('client_id'){{$message}}  @enderror

            </div>

            <div>
                <label for="receipient">Receipient : </label>
                <input type="text" name="receipient">
                @error('receipient')**{{$message}}  @enderror
            </div>


<hr>
            <div>
                <label for="using">Method : </label>
                <select name="using" id="method" onchange="change()">
                    <option value="card">Card</option>
                    <option value="e-trans">e-transfer</option>
                    <option value="dr-dpst">Direct Deposit</option>
                </select>
            </div>

            <div id="card-details">
                @if ($card)
                <label for="card_number">Card number:</label>
                <input type="text" name="card_number" value="{{$card->card_number}}">
                @else
                <p> You Don't Have a Secured Card </p>
                @endif
        </div>
                <div id="e-transfer-details" style="display: none;">
                   @if ($loc)
                <div style="padding:0px">
                   <label for="rec_email">E-mail of Receipient:</label>
                   <input type="email" name="rec_email"> <br>
                </div>
                <div style="padding:0px">
                    <label for="LOC_num">Your Line Of Credit Account Number : </label>
                   <input type="number" name="LOC_num" id="" value = "{{$loc->account_number}}">
                </div>

                   @else
                   <p>You Don't have a line of Credit Account</p>
                   @endif
                </div>

                <section id="direct-deposit-details" style="display: none;">
                   @if ($loc)
                    <div>
                        <label for="LOC_num">Your Line Of Credit Account Number : </label>
                        <input type="number" name="LOC_num" id="" value = "{{$loc->account_number}}">
                    </div>
                    <div>
                        <label for="transit">Transit:</label>
                        <input type="text" name="transit">
                    </div>
                    <div>
                        <label for="inst_number">Institution Number:</label>
                        <input type="text" name="inst_number">
                    </div>
                    <div>
                        <label for="account_number">Account Number:</label>
                        <input type="number" name="account_number">
                    </div>
                    @else
                   <p>You Don't have a line of Credit Account</p>
                   @endif
                </section>

          <hr>
            <div>
                <label for="details">Note to Receipient : </label>
                <input type="text" name="details">
                @error('details')**{{$message}}  @enderror
            </div>

            <div>
                <label for="amount">Amount : </label>
                <input type="number" name="amount" step="any">
                @error('amount')**{{$message}}  @enderror
            </div>

            <input type="submit" class="submit-btn" value="Transfer">
        </form>

    </div>

    <script>

        function change(){

            var card = document.getElementById('card-details');

            var e_trans = document.getElementById('e-transfer-details');

            var dr_dpst = document.getElementById('direct-deposit-details');

            if(method.value == "card"){
                card.style.display = 'flex';
                e_trans.style.display = 'none';
                dr_dpst.style.display = 'none';
            }
            if(method.value == "e-trans"){
                card.style.display = 'none';
                e_trans.style.display = 'block';
                dr_dpst.style.display = 'none';
            }
            if(method.value == "dr-dpst"){
                card.style.display = 'none';
                e_trans.style.display = 'none';
                dr_dpst.style.display = 'block';
            }
        }

    </script>


@include('_partials.footer')


