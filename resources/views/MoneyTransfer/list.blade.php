@include('_partials.header')

<header>
    <title>List of Money Transfer Requests</title>
</header>

<div class="wrapper">
    <div class="content-req">
        <div class="container" style="overflow-x:auto;">
        <h1>Your Money Transfer Requests</h1>
        <table>
            <thead>
                <tr>
                    <th>Sender</th>
                    <th>Receipient</th>
                    <th>Method</th>
                    <th>Details</th>
                    <th>Amount</th>
                    <th>Transfer Status </th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{$item->sender}}</td>
                    <td>{{$item->receipient}}</td>
                    <td>{{$item->using}}</td>
                    <td>{{$item->details}}</td>
                    <td>{{$item->amount}}</td>
                    <td>{{$item->transferStatus}}</td>
                    @if ($item->transferStatus == 'in-progress')
                    <td> <a href="{{route('deletemoneytr', $item->id)}}" style="padding: 0.5em; background-color:red; color: white; border-radius:7px; text-decoration:none">Delete</a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>

@include('_partials.footer')
