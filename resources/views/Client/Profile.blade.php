@include('_partials.header')

<header>
    <title>Welcome {{$client->name}} </title>
</header>




<main style="position: relative">
    <a style="position:absolute; z-index:1; right:3%; margin: 0px 2em; text-decoration:none; color:white; background-color:#79c6dd; padding: 0.4em 1.2em; border-radius: 15px;" href="{{route('logoutClient')}}">Logout</a>
    <div class="wrapper">
        <section class="container">

            <h1 style="text-align: center; padding-bottom:1em; border-bottom: 1px solid rgba(128, 128, 128, 0.371);">Welcome, {{$client->name}}</h1>

            <div class="profile-content">
                <div class="account-details">
                    <h2>Account Details</h2>
                    <div class="details-list">
                        <ul>
                            <li><strong>Name :</strong> </li>
                            <li><strong>Email :</strong> </li>
                            <li><strong>Address :</strong> </li>
                            <li><strong>Phone :</strong> </li>
                            <li><strong>Support PIN :</strong> </li>
                        </ul>
                        <ul>
                            <li>{{$client->name}}</li>
                            <li>{{$client->email}}</li>
                            <li>{{$client->address}}</li>
                            <li>{{$client->contact}}</li>
                            <li>{{$client->pin}}</li>
                        </ul>
                    </div>
                    <a class="money-btn" href="{{route('selfUpdate', $client->id)}}">Edit Profile Details</a>
                </div>
                <div class="account-list">
                    <h2>Accounts</h2>
                    <ul>
                        @if ($lineoCr)
                        <a href="{{route('locrview')}}"><li>Line of Credit</li></a>
                        @else
                        <li id="noloc">Line of Credit</li>
                        @endif

                        @if ($credit_reb)
                        <a href="{{route('crbview')}}"><li>Credit Rebuilder</li></a>
                        @else
                        <li id="nocrb">Credit Rebuilder</li>
                        @endif

                        @if ($sec_card)
                        <a href="{{route('seccrrview')}}"><li>Secured Card</li></a>
                        @else
                        <li id="noscrd">Secured Card</li>
                        @endif

                        @if ($loan)
                        <a href="{{route('loanrview')}}"><li>Loan</li></a>
                        @else
                        <li id="noloan">Loan</li>
                        @endif

                        @if ($money)
                        <a href="{{route('allreq')}}"><li>Money Transfer Requests</li></a>
                        @else
                        <li id="noloan">Money Transfer Requests</li>
                        @endif

                    </ul>
                    <a class="money-btn" href="{{route('NewMoneyTransfer')}}">Money Transfer</a>

                    <a class="money-btn" href="{{route('payform')}}">Make Payment</a>
                    @if (Session::has('fail'))
                    <p>**{{Session::get('fail')}}</p>
                    @endif
                </div>
            </div>
        </section>
    </div>
</main>









@include('_partials.footer')
