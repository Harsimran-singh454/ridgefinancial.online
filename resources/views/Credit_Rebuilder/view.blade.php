@include('_partials.header')

<header>
    <title> Account Details </title>
</header>

<main>
    <div class="wrapper">
        <div class="container">
            <h1>your Credit Rebuilder Account Details</h1>

            <div class="view-content">

                <ul id="headings">
                    <li> Account Number :</li>
                    <li> Monthly Fee :</li>
                    <li> Amount Saved :</li>
                    <li> Total Line of Credit :</li>
                    <li> Total Payments:</li>
                    <li> Total Payments to Date :</li>
                    <li> Due Date :</li>
                </ul>
                <ul id="data">
                    <li>{{$data->account_number}}</li>
                    <li>${{$data->monthly_fee}}</li>
                    <li>${{$data->amount_saved}}</li>
                    <li>{{$data->tot_lineOfCr}}</li>
                    <li>{{$data->tot_payments}}</li>
                    <li>{{$data->tot_payments_toDate}}</li>
                    <li>{{$data->due_date}}</li>
                </ul>
            </div>
            <a style="text-decoration:none" href="{{route('clientProfile')}}"><-- Go Back</a>
        </div>
    </div>
</main>


@include('_partials.footer')
