
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
                        <h3>Edit user</h3>
                    </div>
                    <div class="card-body">

                        <form action='/role-servece-update/{{$service->id}}' method="POSt">
{{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" name="name1" class="form-control" value="{{$service->name}}">
                            </div>
                            <div class="form-group">
                                <label for="Name">Status</label>
                                <input type="text" name="status" class="form-control" value="{{$service->status}}">
                            </div>
                            <div class="form-group">
                                <label for="Name">Status</label>
                                <input type="text" name="description" class="form-control" value="{{$service->description}}">
                            </div>

                            <div class="form-check">

                                <button type="submit" class="btn btn-primary">update</button>
                                <a href="/role-register" class="btn-danger btn">cansel</a>
                            </div>
                        </form>



                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
