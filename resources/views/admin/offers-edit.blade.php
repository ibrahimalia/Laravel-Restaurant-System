
@extends('layouts.master')
@section('title')
    yazan
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Offers</h3>
                    </div>
                    <div class="card-body">

                        <form action='/role-offers-update/{{$offers->id}}' method="POSt">
{{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="Name">Name Offer</label>
                                <input type="text" name="nameOffer" class="form-control" value="{{$offers->nameOffer}}">
                            </div>
                            <div class="form-group">
                                <label for="Name">Describe Offer</label>
                                <input type="text" name="describeOffer" class="form-control" value="{{$offers->describeOffer}}">
                            </div>
                             <div class="form-group">
                                <label for="Name">Old Price</label>
                                <input type="number" name="oldPrice" class="form-control" value="{{$offers->oldPrice}}">
                            </div>
                            <div class="form-group">
                                <label for="Name">New Price</label>
                                <input type="number" name="newPrice" class="form-control" value="{{$offers->newPrice}}">
                            </div>

                           
                            <div class="form-check">

                                <button type="submit" class="btn btn-primary">update</button>
                                <a href="/role-table-show" class="btn-danger btn">cansel</a>
                            </div>
                        </form>



                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
