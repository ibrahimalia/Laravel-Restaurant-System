@extends('home_general')

@section('content')
    @if(session('site'))
        <div class="alert">
            <span class="msg">{{session('site')}}</span>
            <div class="close-btn">
                <span class="fas fa-check"></span>
            </div>
        </div>
    @endif
    @if(session('siteChange'))
        <div class="alert">
            <span class="msg">{{session('siteChange')}}</span>
            <div class="close-btn">
                <span class="fas fa-check"></span>
            </div>
        </div>
    @endif
    @if(session('table'))
        <div class="alert">
            <span class="msg">{{session('table')}}</span>
            <div class="close-btn">
                <span class="fas fa-check"></span>
            </div>
        </div>
    @endif
@if(app()->getLocale()=='en')
<div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="2"></li>
        <li data-target="#demo" data-slide-to="0"class="active"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item">
            <img src="{{asset('food2.jpg')}}" alt="Chicago" width="100%" height="500">
            <div class="carousel-caption">

                <p>Thank you!</p>
            </div>
        </div>
        <div class="carousel-item active">
            <img src="{{asset('food3.jpg')}}" alt="New York" width="100%" height="500">
            <div class="carousel-caption" style="color: yellow;font-size: 30px">

                <p>We love the Big Burger!</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>
        <div class="d-flex justify-content-center align-items-center">
            <div style="margin: 10px;"><a  href="/home/order_page" style="text-decoration: none;font-size: 10px"><button type="button" class="btn btn-warning">Orders</button></a></div>
            <div style="margin: 10px;"><a  href="/home/Search_Table_page" style="text-decoration: none;font-size: 10px"><button type="button" class="btn btn-warning">Tables</button></a></div>
            <div style="margin: 10px;"><a  href="/home/recommendation_page" style="text-decoration: none;font-size: 10px"><button type="button" class="btn btn-warning">Offers</button></a></div>
        </div>

@else

    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="2"></li>
            <li data-target="#demo" data-slide-to="0"class="active"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item">
                <img src="{{asset('food2.jpg')}}" alt="Chicago" width="100%" height="500">
                <div class="carousel-caption">

                    <p>شكرا على ثقتك</p>
                </div>
            </div>
            <div class="carousel-item active">
                <img src="{{asset('food3.jpg')}}" alt="New York" width="100%" height="500">
                <div class="carousel-caption" style="color: yellow;font-size: 30px">

                    <p>نحن نحب كثيراBig Burger!</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div style="margin: 10px;"><a  href="/home/order_page" style="text-decoration: none;font-size: 15px"><button type="button" class="btn btn-warning">اختر طلبيتك</button></a></div>
        <div style="margin: 10px;"><a  href="/home/Search_Table_page" style="text-decoration: none;font-size: 15px"><button type="button" class="btn btn-warning">احجز طاولتك</button></a></div>
        <div style="margin: 10px;"><a  href="/home/recommendation_page" style="text-decoration: none;font-size: 15px"><button type="button" class="btn btn-warning">عروض</button></a></div>
    </div>


@endif
@endsection

