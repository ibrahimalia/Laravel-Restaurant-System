@extends('home_general')

@section('content')
<div style="float: right;position: relative;top: -150px;left: -10px"><a  href="http://localhost:8000/en/home/main/rtable" style="text-decoration: none;font-size: 15px"><button type="button" class="btn btn-warning">Reserve your table</button></a></div>
<div class="container-fluid " id="boxx">
    <br><br><br>
    <form action="" class="was-validated"  method="POST">
        @csrf
        <div class="form-group autocomplete"  >
            <label for="city">Time reservation:</label>
            <input type="time" id="appt" class="  form-control"  name="time"
                   style="font-size: 15px" min="09:00" max="18:00" required>
        </div>
        <button type="submit" class="btn btn-danger" > Reserve</button>
    </form>
    <br><br>
</div>
@endsection
