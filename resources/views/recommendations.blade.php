@extends('home_general')

@section('content')
    @if(session('order'))
        <div class="alert ">
            <span class="msg">{{session('order')}}</span>
            <div class="close-btn">
                <span class="fas fa-check"></span>
            </div>
        </div>
    @endif

    <div class="w3-row-padding">
          @foreach($offer as $data)

        <div class="w3-third">
            <form action="" method="POST">
                @csrf
            <div class="w3-card">

                <div class="w3-container w3-red" >
                    <span class="w3-tag w3-yellow">offer</span><br>
                    <h1 style="text-align: center"><b>{{$data->nameOffer}}</b></h1>
                    <input type="text" name="name" value="{{$data->nameOffer}}" hidden>
                    <input type="text" name="quntites" value="---" hidden>
                    <input type="text" name="price" value="---" hidden>

                </div>
                <div class="w3-container w3-large">
                    <p>{{$data->describeOffer}}</p>
                    <hr>
                    <p style="font-size: 12px">old price :<del>{{$data->oldPrice}}</del></p>
                    <p style="font-size: 12px">Now only {{$data->newPrice}}</p>
                    <input type="text" name="total" value="{{$data->newPrice}}" hidden>
                </div>
                <div class="w3-container w3-red  w3-large">
                     @foreach($site as $data1)
                        <input type="text" name="site" value="{{$data1->city}},{{$data1->region}}" hidden>
                    @endforeach
                    <button style="float: right;border-radius: 10px" class="w3-button w3-white w3-border w3-border-red ">Order</button>
                </div>

            </div>
            </form>
        </div>
        @endforeach
    </div>


    @endsection
