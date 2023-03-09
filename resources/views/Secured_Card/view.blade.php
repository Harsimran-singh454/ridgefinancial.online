@include('_partials.header')

<header>
    <title>Secured Account Details</title>
</header>

<main>
    <div class="wrapper">
        <div class="container">
            <h1>your Secured Card Account Details</h1>

            <div class="view-content">
                <ul id="headings">
                    <li> Account Number :</li>
                    <li> Credit Limit :</li>
                    <li> Current Balance :</li>
                    <li> Authorizations :</li>
                    <li> Credit Remaining:</li>
                    <li> Due Date :</li>
                    <li> Cycle Date :</li>
                    {{-- <li> Transactions :</li> --}}

                </ul>

                <ul id="data">
                    <li>{{$data->account_number}}</li>
                    <li>${{$data->credit_limit}}</li>
                    <li>${{$data->current_balance}}</li>
                    <li>${{$data->authorizations}}</li>
                    <li>${{$data->credit_remaining}}</li>
                    <li>{{$data->due_date}}</li>
                    <li>{{$data->cycle_date}}</li>
                    {{-- <li>{{$data->transactions}}</li> --}}

                </ul>
            </div>

            <a style="text-decoration:none" href="{{route('clientProfile')}}"><-- Go Back</a>
        </div>
    </div>
</main>


@include('_partials.footer')
