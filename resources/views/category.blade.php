@extends('home_general')

@section('content')
    @if(session('evaluation'))
        <div class="alert">
            <span class="msg">{{session('evaluation')}}</span>
            <div class="close-btn">
                <span class="fas fa-check"></span>
            </div>
        </div>
    @endif
    @if(app()->getLocale()=='en')

        <div class="w3-row-padding">
            @foreach($category as $data)
       <div class="w3-third">
           <a href="/home/content_category/{{$data->id}}" style="text-decoration: none">
                <div class="w3-card-4 w3-container w3-xlarge w3-yellow w3-round-xlarge">

                        <span style="font-size: 18px" class="w3-text-red"><b>{{$data->nameCategory}}</b></span><hr>
                    <p style="font-size: 20px" >
                        {{$data->descriptionCategory}}
                    </p>
                    <p style="float: right;color: darkred;font-size: 10px">Click to see meals</p>
                </div>
           </a>
                <br>
            </div>
           @endforeach

        </div>


    @else

        <div class="w3-row-padding">
            @foreach($category as $data)
                <div class="w3-third">
                    <a href="/home/content_category/{{$data->id}}" style="text-decoration: none">
                        <div class="w3-card-4 w3-container w3-xlarge w3-yellow w3-round-xlarge">

                            <span style="font-size: 18px" class="w3-text-red"><b>{{$data->nameCategory}}</b></span><hr>
                            <p style="font-size: 20px" >
                                {{$data->descriptionCategory}}
                            </p>
                            <p style="float: right;color: whitesmoke;font-size: 10px">Click to see meals</p>
                        </div>
                    </a>
                    <br>
                </div>
            @endforeach

        </div>
    @endif
    @endsection
