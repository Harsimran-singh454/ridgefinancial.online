@include('_partials.header')

<header>
    <title>Account Details</title>
</header>

<main>
    <div class="wrapper">
        <div class="container">
            <h1>your Loan Account Details</h1>

            <div class="view-content">
                <ul id="headings">
                    <li> Account Number :</li>
                    <li> Account Balance :</li>
                    <li> Due Date :</li>
                    <li> Payment Amount :</li>
                    <li> Frequency:</li>
                    <li> Current Balance :</li>
                    <li> Interest Rate :</li>
                    <li> Term :</li>
                    <li> Payment :</li>
                </ul>

                <ul id="data">
                    <li>{{$data->account_number}}</li>
                    <li>${{$data->account_balance}}</li>
                    <li>{{$data->due_date}}</li>
                    <li>${{$data->payment_amount}}</li>
                    <li>{{$data->frequency}}</li>
                    <li>${{$data->current_balance}}</li>
                    <li>{{$data->interest_rate}}</li>
                    <li>{{$data->term}}</li>
                    <li>${{$data->payment}}</li>

                </ul>
            </div>

            <a style="text-decoration:none" href="{{route('clientProfile')}}"><-- Go Back</a>
        </div>
    </div>
</main>


@include('_partials.footer')
