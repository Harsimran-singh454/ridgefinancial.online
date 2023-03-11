@include('_partials.header')

<header>
    <title> Account Details </title>
</header>

<main>
    <div class="wrapper">
        <div class="container">
            <h1>Inquiry Details</h1>

            <div class="view-content">
                <ul id="headings">
                    <li> Name :</li>
                    <li> Phone Number :</li>
                    <li> Email :</li>
                    <li> Service :</li>
                    <li> Best Time to Contact :</li>
                    <li> Message :</li>
                    <li> Status :</li>
                </ul>

                <ul id="data">
                    <li>{{$data->name}}</li>
                    <li>${{$data->phone}}</li>
                    <li>${{$data->email}}</li>
                    <li>${{$data->service}}</li>
                    <li>${{$data->time_to_reach}}</li>
                    <li>{{$data->message}}</li>
                    <li>{{$data->status}}</li>
                </ul>
            </div>

            <a style="text-decoration:none" href="{{route('Dashboard')}}"><-- Go Back</a>
            @if($data->status == 'under-review')
            <div style="display: flex; flex-direction:row; justify-content: center">
            <a style="text-decoration:none; margin: 1em" href="{{route('markdone',$data->id)}}">Approve ✅</a>
            <p style="margin: 1em">|</p>
            <a style="text-decoration:none; margin: 1em" href="{{route('reject',$data->id)}}">Reject ❌</a>
            </div>
            @endif
        </div>
    </div>
</main>


@include('_partials.footer')
