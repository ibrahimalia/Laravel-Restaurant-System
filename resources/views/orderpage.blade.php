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
    <div style="float: right;position: relative;top: -150px"><a href="" style="text-decoration: none;font-size: 15px"><button type="button" class="btn btn-warning">Choose your order</button></a></div>

    <div class="w3-light-grey">
        <!-- Right Column -->
        <div class="w3-twothird" >

            <div class="w3-container w3-card w3-white w3-margin-bottom" >

                <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Menu food</h2>

                <div class="container">

                    <div id="accordion">
                        @foreach($category as $data)
                        <div class="card" >
                            <div class="card-header bg-warning" >
                                <a class="card-link" data-toggle="collapse" href="#collapse{{$data->id}}">
                                    {{$data->nameCategory}}
                                </a>
                            </div>
                            <div id="collapse{{$data->id}}" class="collapse show" data-parent="#accordion">
                                <div class="card-body">
                                    <table class="table table-striped table-hover table-responsive-lg" style="font-size: 10px">
                                        <tr>
                                            <td></td>
                                            <td> Food</td>
                                            <td>Price</td>
                                            <td>Add Food</td>
                                        </tr>
                                        @foreach($order as $data1)
                                            @if($data->id==$data1->category_id)
                                            <tr>
                                                <td> <img src="{{ asset('uploads/' . $data1->image) }}" alt="Cinque Terre" width="70" height="70"></td>
                                                <td>{{$data1->nameMeal}}</td>
                                                <td>{{$data1->price}}</td>
                                                <td><a href="" id="{{$data1->id}}" data-name="{{$data1->nameMeal}}" data-id="{{$data1->id}}"
                                                       data-price="{{$data1->price}}" class="btn btn-warning btn-sm add">+</a></td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                            <br>

                    </div>
                </div>
            </div>
            </div>
            <!-- End Right Column -->
        </div>

    <div class="w3-container w3-card w3-white" style="float: left" >
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Your bill
        </h2>
        <form action="" method="post">
            @csrf
            @foreach($site as $n)
                <input type="hidden" name="site" value="{{$n->city}},{{$n->region}}">
            @endforeach
            <table class="table table-striped addt " style="font-size: 10px">

                <tr>
                    <th>name</th>
                    <th>quntity</th>
                    <th>price</th>
                    <th>del</th>
                </tr>


            </table>
            <p>total price:</p>
            <div class="total" style="color: #e3342f;font-size: 20px">
                0
            </div><br>
            <button  class="btn btn-default btn-sm but" > Add Meal</button>
        </form>
    </div>
@endsection
