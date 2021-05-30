@extends('home_general')

@section('content')



        <div class="w3-row-padding">


            @foreach($content as $data)
                <div class="w3-third w3-margin-bottom">

                    <ul class="w3-ul w3-border w3-center w3-hover-shadow">
                        <li class=" w3-xxxlarge w3-padding-32"><img style="width: 200px;height: 200px" src="{{ asset('uploads/'.$data->image) }}"></li>
                        <li class="w3-padding-16">
                            <p class="w3-wide">{{$data->nameMeal}}</p>
                            <h2 class="w3-wide">$ {{$data->price}}</h2>
                        </li>
                        <li class="w3-padding-16"><b>{{$data->calories}}</b> calories <b>{{$data->fat}}</b>fat</li>
                        <li class="w3-padding-16"><b>{{$data->carbohydrates}}</b> carbohydrates</li>
                        <li class="w3-padding-16"><b>{{$data->protein}}</b> protein</li>
                        <li class="w3-padding-16"><b>{{$data->avgRate}}</b>&#11088;/5 </li>


                    </ul>
                    <a href="/home/Evaluation_page/{{$data->id}}" style="float: right"><button class="btn btn-warning btn-sm"><span>&#11088;</span></button></a>

                </div>
            @endforeach



        </div>



@endsection
