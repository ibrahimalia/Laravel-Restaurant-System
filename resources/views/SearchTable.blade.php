@extends('home_general')

@section('content')

        <div style="float: right;position: relative;top: -150px;left: -10px"><a  href="http://localhost:8000/en/home/main/rtable" style="text-decoration: none;font-size: 15px"><button type="button" class="btn btn-warning">Reserve your table</button></a></div>
        <div class="container-fluid " id="boxx">
            <h1 class="embed-responsive">Enter date reservation to display table:</h1>
            <form action="" class="was-validated"  method="POST">
                @csrf

                <input type="date" id="start" style="width: 100%;height: 50px;font-size: 20px" class= form-control" name="date"
                       min="2021-01-01" max="2021-12-31" required>


                <button type="submit" class="btn btn-warning" style="float: right"> Search</button>
            </form>
            <br><br>
            <hr>

            @foreach($result as $n)
                <div class="embed-responsive shadow-lg"  style="max-width: 430px;float: left;padding: 20px;font-size: 10px;border: 1px solid black;box-shadow: #5a6268;margin: 3px">
                    <div class="shadow-lg w3-margin-bottom ">
                        <img class="embed-responsive"  src="{{asset('table.jpg')}}" alt="John">
                        <hr>
                        <p >number table: {{$n->id}}</p>
                        <p>capacity table :{{$n->capacity}} person</p>
                        <p>price reservation table :{{$n->tableFee}} $</p>
                        <p><a style="text-decoration: none;background: #5a6268" href="/home/Reservation_Table/{{$date}}/{{$n->id}}"><button style="float: right;" class="w3-button btn btn-danger w3-block">Select</button></a></p>
                    </div>
                </div>
            @endforeach
        </div>

    @endsection
