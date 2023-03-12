@include('_partials.header')

<header>
    <title>Dashboard</title>
</header>

<main>

    <div class="wrapper">
        <h1 style="text-align: center">Welcome {{$admin->name}}</h1>


        <div class="content">

            {{-- ======================= NAV =========================== --}}

            <nav class = "admin-nav">
                <h2 style="text-align:center">Browse</h2>
                <section>
                <img id="open" onclick = expandMenu() src="/images/arrow_righ.svg"  alt="open-menu">
                <img id="close" onclick = closeMenu() src="/images/arrow_drop_down.svg" alt="close-menu">
                </section>
                <div id="menu">
                    <ul>

                    @if ($admin->role == 'level1')
                        <li id="admin-btn">Admins</li>
                        <ul style="display:none" class="sub-nav" id="admin-sub">
                            <a href="{{route('AdminRegister')}}"><li>Add Admin</li></a>
                            <a href=""><li>View Admins</li></a>

                        </ul>
                    @endif

                        <li id="client-btn">Clients</li>
                        <ul style="display:none" class="sub-nav" id="client-sub">
                            <a href="{{route('AddClient')}}"><li>Add Client</li></a>
                            <a href=""><li>View Clients</li></a>

                        </ul>
                        <li id="loan-btn">Loans</li>
                        <ul style="display:none" class="sub-nav" id="loan-sub">
                            <a href="{{route('AddLoan')}}"><li>Add New</li></a>
                            <a href=""><li>View Requests</li></a>
                        </ul>
                        <li id="linecr-btn">Line Of Credit</li>
                        <ul style="display:none" class="sub-nav" id="loc-sub">
                            <a href="{{route('AddLineOfCr')}}"><li>Add New</li></a>
                            <a href=""><li>View Requests</li></a>
                        </ul>
                        <li id="scard-btn">Secured Cards</li>
                        <ul style="display:none" class="sub-nav" id="scard-sub">
                            <a href="{{route('AddSecuredCard')}}"><li>Add New</li></a>
                            <a href=""><li>View Requests</li></a>
                        </ul>
                        <li id="cardrb-btn">Credit Rebuilder</li>
                        <ul style="display:none" class="sub-nav" id="cardrb-sub">
                            <a href="{{route('AddCreditRebuilder')}}"><li>Add New</li></a>
                            <a href=""><li>View Requests</li></a>
                        </ul>
                        <li id="moneyt-btn">Money Transfer Requests</li>
                        <li id="inquiry-btn">New Inquiries</li>


                    </ul>

                    <ul class="admin-actions">

                        <li><a class="profile-settings" href="{{route('changePasswordPageA', $admin->id)}}"> Change Password </a></li>
                        <li><a class="logout" href="{{route('logout')}}"> Logout </a></li>

                    </ul>
                </div>
                </nav>


            {{-- =========================== CONTENT ========================== --}}

            <div class = "content-list">

                @if ($admin->role == 'level1')

                <section id="admins" class="">
                    <h2>Admins</h2>
                    <a href="{{route('AdminRegister')}}" style="background: rgb(21, 205, 21); width: 10%;
                                color:white; border-radius:8px; padding: 1% 2%;
                                black; text-decoration:none;">Add</a>

                        <table style="overflow-x: auto;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                            <tr>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{{$admin->status}}</td>
                                <td> <a id="view" href="{{route('updateAdminPage',$admin->id)}}">View</a></td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                </section>

                @endif


                <section id="clients" class="">
                    <h2>Clients</h2>
                    <a href="{{route('AddClient')}}" style="background: rgb(21, 205, 21); width: 10%;
                                color:white; border-radius:8px; padding: 1% 2%;
                                black;font-size:1em; text-decoration:none;">Add</a>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                            <tr>
                                <td>{{$client->name}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->address}}</td>
                                <td> <a id="view" href="{{route('editclient',$client->id)}}">View</a></td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                </section>

                <section id="loans">
                    <h2>Loans</h2>
                    <a href="{{route('AddLoan')}}" style="background: rgb(21, 205, 21); width: 10%;
                    color:white; border-radius:8px; padding: 1% 2%;
                    black;font-size:1em; text-decoration:none;">Add</a>
                    <table style="overflow-x: auto;">
                        <thead>
                            <tr>
                                <th>Account Number</th>
                                <th>Client name</th>
                                <th>Due Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loans as $loan)
                            <tr>
                                <td>{{$loan->account_number}}</td>
                                @foreach ($clients as $client)
                                @if ($client->id == $loan->client_id)
                                <td>{{$client->name}}</td>
                                @endif
                                @endforeach
                                <td>{{$loan->due_date}}</td>
                                <td> <a id="view" href="{{route('editloan',$loan->id)}}">View</a></td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>

                <section id="line-of-credit" class="hidden">
                    <h2>Line Of Credit</h2>
                    <a href="{{route('AddLineOfCr')}}" style="background: rgb(21, 205, 21); width: 10%;
                    color:white; border-radius:8px; padding: 1% 2%;
                    black;font-size:1em; text-decoration:none;">Add</a>
                    <table style="overflow-x: auto;">
                        <thead>
                            <tr>
                                <th>Account Number</th>
                                <th>Client name</th>
                                <th>Due Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lineOcrs as $lineOcr)
                            <tr>
                                <td>{{$lineOcr->account_number}}</td>
                                @foreach ($clients as $client)
                                @if ($client->id == $lineOcr->client_id)
                                <td>{{$client->name}}</td>
                                @endif
                                @endforeach
                                <td>{{$lineOcr->due_date}}</td>
                                <td> <a id="view" href="{{route('editlineofcr',$lineOcr->id)}}">View</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>

                <section id="secured-cards" class="hidden">
                    <h2>Secured Cards</h2>
                    <a href="{{route('AddSecuredCard')}}" style="background: rgb(21, 205, 21); width: 10%;
                    color:white; border-radius:8px; padding: 1% 2%;
                    black;font-size:1em; text-decoration:none;">Add</a>
                    <table style="overflow-x: auto;">
                        <thead>
                            <tr>
                                <th>Account Number</th>
                                <th>Client name</th>
                                <th>Due Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($secu_cards as $secu_card)
                            <tr>
                                <td>{{$secu_card->name}}</td>
                                @foreach ($clients as $client)
                                @if ($client->id == $secu_card->client_id)
                                <td>{{$client->name}}</td>
                                @endif
                                @endforeach
                                <td>{{$secu_card->due_date}}</td>
                                <td> <a id="view" href="{{route('editscrcard',$secu_card->id)}}">View</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>

                <section id="credit-rebuilder" class="hidden">
                    <h2>Credit Rebuilder</h2>
                    <a href="{{route('AddCreditRebuilder')}}" style="background: rgb(21, 205, 21); width: 10%;
                    color:white; border-radius:8px; padding: 1% 2%;
                    black;font-size:1em; text-decoration:none;">Add</a>
                    <table style="overflow-x: auto;">
                        <thead>
                            <tr>
                                <th>Account Number</th>
                                <th>Client name</th>
                                <th>Due Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cr_rbs as $cr_rb)
                            <tr>
                                <td>{{$cr_rb->account_number}}</td>
                                @foreach ($clients as $client)
                                @if ($client->id == $cr_rb->client_id)
                                <td>{{$client->name}}</td>
                                @endif
                                @endforeach
                                <td>{{$cr_rb->due_date}}</td>
                                <td> <a id="view" href="{{route('editcardrb',$cr_rb->id)}}">View</a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </section>


                <section id="moneyt-section">
                    <h2>Transactions</h2>

                    <table style="overflow-x: auto; padding:0px;">
                        <thead>
                            <tr>
                                <th>Sender</th>
                                <th>Receipient</th>
                                <th>Amount</th>
                                <th>Method</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($moneyts as $moneyt)
                            <tr>
                                <td>{{$moneyt->sender}}</td>
                                <td>{{$moneyt->receipient}}</td>
                                <td>{{$moneyt->amount}}</td>
                                <td>{{$moneyt->using}}</td>
                                <td>{{$moneyt->transferStatus}}</td>
                                <td> <a id="view" href="{{route('transferdetails', $moneyt->id)}}">View</a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </section>



                <section id="inquiry-section">
                    <h2>Inquires</h2>

                    <table style="overflow-x: auto; padding:0px;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Service</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inquiries as $inquiry)
                            <tr>
                                <td>{{$inquiry->name}}</td>
                                <td>{{$inquiry->phone}}</td>
                                <td>{{$inquiry->service}}</td>
                                <td>{{$inquiry->status}}</td>
                                <td> <a id="view" href="{{route('viewreq', $inquiry->id)}}">View</a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </section>


            </div>
        </div>



    </div>

</main>



<script>

    var open = document.getElementById("open");
    var close = document.getElementById("close");
    var menu = document.getElementById("menu");

    // open.onclick = expandMenu();
    // close.onclick = closeMenu();

    function expandMenu(){
        open.style.display = "none";
        close.style.display = "block";
        menu.style.display = "flex";
    }

    function closeMenu(){
        open.style.display = "block";
        close.style.display = "none";
        menu.style.display = "none";
    }



</script>



@include('_partials.footer')
