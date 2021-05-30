
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
                        <h3>Edit Table</h3>
                    </div>
                    <div class="card-body">

                        <form action='/role-table-update/{{$table->id}}' method="POSt">
{{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="Name">capacity</label>
                                <input type="number" name="capacity" class="form-control" value="{{$table->capacity}}">
                            </div>
                            <div class="form-group">
                                <label for="Name">tableFee</label>
                                <input type="number" name="tableFee" class="form-control" value="{{$table->tableFee}}">
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
