<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" href="{{ asset('csshomegernal.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('csshome.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('csssitepage.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('cssabout.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('csstable.css') }}" rel="stylesheet">
    <script src='{{asset('javascript.js')}}'></script>
</head>
<body>
    <div class="w3-light-grey" style="font-size: 10px">
        <!-- Right Column -->
        <div class="w3-twothird" style="width: 100%">
            <div class="w3-container w3-card w3-white" >
                <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Nutrition Calculator</h2>
                <form action="" method="post">
                    @csrf
                    <table class="table table-striped addt table-responsive-lg " style="width: 100%">

                        <tr>
                            <th>name</th>
                            <th>quantity</th>
                            <th>price</th>
                            <td>calories</td>
                            <td>fat</td>
                            <td>brotien</td>
                            <td>kerbohedrat</td>
                            <th>del</th>
                        </tr>


                    </table>
                    <br><br><hr>
                    <p>محتويات الوجبة</p>

                    <table class="table table-striped table-responsive-lg">

                        <tr>
                            <th>total price</th>
                            <td>total calories</td>
                            <td>total fat</td>
                            <td>total brotien</td>
                            <td>total kerbohedrat</td>

                        </tr>
                        <tr>
                            <td class="totalprice" style="color: #e3342f;font-size: 20px">0</td>
                            <td class="totalcalories" style="color:blue;font-size: 20px">0</td>
                            <td class="totalfat" style="color: #636b6f;font-size: 20px" >0</td>
                            <td class="totalbrotien" style="color: chartreuse;font-size: 20px">0</td>
                            <td class="totalkerbohedrat" style="color: darkred;font-size: 20px">0</td>

                        </tr>


                    </table>

                </form>
            </div>
            <br><br>

            <div class="w3-container w3-card w3-white w3-margin-bottom">

                <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Menu</h2>

                            <table class="table table-striped table-hover table-responsive-lg">
                                <tr>
                                    <td></td>
                                    <td> Food</td>
                                    <td>Add Food</td>
                                </tr>
                                @foreach($items as $item)

                                    <tr>
                                        <td> <img src="{{ asset('uploads/' . $item->image) }}" alt="Cinque Terre" width="70" height="70"></td>
                                        <td>{{$item->nameMeal}}</td>
                                        <td><a href="" id="{{$item->id}}" data-name="{{$item->nameMeal}}" data-id="{{$item->id}}"
                                               data-price="{{$item->price}}" data-calories="{{$item->calories}}"
                                               data-fat="{{$item->fat}}" data-brotien="{{$item->protein}}"  data-kerbohedrat="{{$item->carbohydrates}}" class="btn btn-warning btn-sm add">+</a></td>
                                    </tr>

                                @endforeach
                            </table>

            </div>
            <!-- End Right Column -->
        </div>
        <!-- End Grid -->
    </div>
<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-dark">
    <div class="w3-row-padding">
        <div class="w3-container w3-padding-64 w3-center  w3-xlarge">
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <i class="fa fa-instagram w3-hover-opacity"></i>
            <i class="fa fa-snapchat w3-hover-opacity"></i>
            <i class="fa fa-pinterest-p w3-hover-opacity"></i>
            <i class="fa fa-twitter w3-hover-opacity"></i>
            <i class="fa fa-linkedin w3-hover-opacity"></i>
            <p class="w3-medium">Powered By <a href="/home" target="_blank">Digital Restaurant Team </a></p>
        </div>
    </div>
</footer>
</body>
</html>



