@include('/_partials.header')

<header>
    <title>Money Transfer Requests</title>
</header>

<div class="wrapper">
    <div class="content-trandetails">

        <div class="details">
        <ul class="headings">
            <li>Sender : </li>
            <li>Receipient : </li>
            <li>Method : </li>

            @if ($data->using == 'card')
            <li>Card Number: </li>
            @endif

            @if ($data->using == 'e-trans')
            <li>Account Number:</li>
            <li>Receipient's Email:</li>
            @endif

            @if ($data->using == 'dr-dpst')
            <li>Account Number:</li>
            <li>Transit : </li>
            <li>Institution : </li>
            <li>Account Number : </li>
            @endif

            <li>Details : </li>
            <li>Amount : </li>
        </ul>

        <ul>
            <li>{{$data->sender}}</li>
            <li>{{$data->receipient}}</li>
            <li>{{$data->using}}</li>

            @if ($data->using == 'card')
            <li>{{$data->card_number}}</li>
            @endif

            @if ($data->using == 'e-trans')
            <li>{{$data->LOC_num}}</li>
            <li>{{$data->rec_email}}</li>
            @endif

            @if ($data->using == 'dr-dpst')
            <li>{{$data->LOC_num}}</li>
            <li>{{$data->transit}}</li>
            <li>{{$data->inst_number}}</li>
            <li>{{$data->account_number}}</li>
            @endif

            <li>{{$data->details}}</li>
            <li>${{$data->amount}}</li>
        </ul>
    </div>

        <div class="status">
            <span>Transfer Status : </span>
            <p> {{$data->transferStatus}} </p>
        </div>
        @if ($data->transferStatus != 'completed' && $data->transferStatus != 'Declined')
        <div style="display:flex; flex-direction: row; width:40%; margin: 1em auto;">
            <a style="text-decoration:none; margin:1em auto;" href="{{route('markdone', $data->id)}}">Approve ✅ | </a>
            <a style="text-decoration:none; margin:1em auto;" href="{{route('declined', $data->id)}}">Decline ❌</a>
        </div>
        @endif


        <a style="text-decoration:none; margin:2em" href="{{route('Dashboard')}}"><-- Go Back</a>
    </div>
</div>


@include('/_partials.footer')
