@extends('home_general')

@section('content')
    <style>
        .bs-example{
            margin: 20px;
        }
    </style>
    <script>
        $(document).ready(function(){
            // Read value on page load
            $("#result b").html($("#customRange").val());

            // Read value on change
            $("#customRange").change(function(){
                $("#result b").html($(this).val());
            });
        });
    </script>
</head>
<body>

    <div style="float: right;position: relative;top: -150px"><a  href="/home/main/orderpage/" style="text-decoration: none;font-size: 15px"><button type="button" class="btn btn-warning">Choose your order</button></a></div>
    <div class="container-fluid " id="boxx">
        <form action="" class="was-validated"  method="POST">
            @csrf

            <div class="card blue-grey lighten-5" style="position: relative;left: 90px">

                <!--Card image-->
                <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%282%29.jpg" alt="Card image cap">

                <div class="card-body text-center">

                    <h3 class="indigo-text mt-4"><strong>Choose your option</strong></h3>

                    <div class="d-flex justify-content-center my-4 pt-3">
                        <span class="font-weight-bold blue-text mr-2 mt-1"><i class="fas fa-thumbs-down" aria-hidden="true"></i></span>

                            <input  type="range" class="custom-range" id="customRange" min="1" max="5" name="rate">

                        <span class="font-weight-bold blue-text ml-2 mt-1"><i class="fas fa-thumbs-up" aria-hidden="true"></i></span>

                    </div>
                    <div id="result"><span>&#11088;</span><b></b></div>

                </div>
                @if($show==0)
                <button type="submit" class="btn btn-danger" >Enter your Evaluation</button>
                @endif
            </div>
        </form>




@endsection



