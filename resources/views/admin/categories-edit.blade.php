
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
                        <h3>Edit Categories </h3>
                    </div>
                    <div class="card-body">

                        <form action='/role-categories-update/{{$categories->id}}' method="POSt">
{{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="Name">Name Category</label>
                                <input type="text" name="nameCategory" class="form-control" value="{{$categories->nameCategory}}">
                            </div>
                            <div class="form-group">
                                <label for="Name">Description Category</label>
                                <input type="text" name="descriptionCategory" class="form-control" value="{{$categories->descriptionCategory}}">
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
