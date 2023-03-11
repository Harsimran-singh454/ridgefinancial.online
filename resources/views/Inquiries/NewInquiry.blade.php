@include('_partials.header')

<header>
    <title>Submit Inquiry</title>
</header>

<main>

    <div class="form-container">

        <form action="{{route('sendreq')}}" method="post" name="">
            @csrf

            @if(Session::get('Success'))
            <p style="background-color:rgba(119, 255, 119, 0.578); padding:15px 10px">{{Session::get('Success')}}</p>
            @endif


            @if(Session::get('fail'))
            <p style="color: white; background-color:rgba(255, 0, 0, 0.512); padding:3em 0px;
                     display:flex; justify-content: center; margin: 10px auto;
                     border-radius:30px">{{Session::get('fail')}}</p>
            @endif

            <h1 style="margin:1em auto">Get in Touch with Us.</h1>

            <div>
                <label for="name">Name : </label>
                <input type="text" name="name" required>
            </div>

            <div>
                <label for="phone">Phone number : </label>
                <input type="text" name="phone" required>
            </div>

            <div>
                <label for="email">Email : </label>
                <input type="text" name="email" required>
            </div>

            <div>
                <label for="service">Service : </label>
                <input type="text" name="service" required placeholder="(ex. Line of credit, Secured credit card, etc.)">
            </div>

            <div>
                <label for="time_to_reach">Best time to reach you : </label>
                <input type="text" name="time_to_reach" required>
            </div>

            <div>
                <label for="message">Message : </label>
                <input type="text" name="message" required>
            </div>

            <input type="submit" value="Submit" class="submit-btn">
    </form>





@include('_partials.footer')


