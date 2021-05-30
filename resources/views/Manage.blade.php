@extends('home_general')

@section('content')
    @if(session('delete'))
        <div class="alert">
            <span class="msg">{{session('delete')}}</span>
            <div class="close-btn">
                <span class="fas fa-check"></span>
            </div>
        </div>
    @endif
    <div class="w3-row-padding w3-center w3-margin-top">
        <div class="w3-third">
            <div class="w3-card w3-container" style="min-height:460px">
                <h3 style="color: darkred">Your Orders</h3><br>
                <table class="table table-hover table-responsive">
                    <thead>
                    <tr>
                        <th scope="col">Meal</th>
                        <th scope="col">Quantities</th>
                        <th scope="col">Price</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($meal as $data )
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->quntites}}</td>
                        <td>{{$data->total}}</td>
                        @if($time->diffInHours($data->time) < 2 )
                        <td><a href="/home/delete_order/{{$data->id}}"><button type="button" class="btn btn-outline-danger">Delete</button></a></td>
                        @endif
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="w3-third">
            <div class="w3-card w3-container" style="min-height:460px">
                <h3 style="color: darkred">Your Tables</h3><br>
                <table class="table table-hover table-responsive">
                    <thead>
                    <tr>
                        <th scope="col">Number</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($table as $data )
                        <tr>
                            <td>{{$data->table_id}}</td>
                            <td>{{$data->date}}</td>
                            <td>{{$data->time}}</td>
                            <td><a href="/home/delete_table/{{$data->id}}"><button type="button" class="btn btn-outline-danger">Delete</button></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
        </div>

        <div class="w3-third">
            <div class="w3-card w3-container" style="min-height:460px">
                <h3 style="color: darkred">Your Evaluation</h3><br>
                <table class="table table-hover table-responsive">
                    <thead>
                    <tr>
                        <th scope="col">Meal</th>
                        <th scope="col">Rate</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($evaluation as $data )
                        <tr>
                            <td>{{$data->nameMeal}}</td>
                            <td>{{$data->rate}}</td>
                            <td><a href="/home/delete_evaluation/{{$data->meal_id}}"><button type="button" class="btn btn-outline-danger">Delete</button></a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>


            </div>
        </div>
    </div>





@endsection
