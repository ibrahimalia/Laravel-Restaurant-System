
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

                        <form action='/role-register-update/{{$users->id}}' method="POSt">
{{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" name="txtEmployeeNo" class="form-control" value="{{$users->name}}">
                            </div>
                            <div class="form-group">
                                <label for="Name">Phone</label>
                                <input type="text" name="txtEmployeeNo" class="form-control" value="{{$users->phone}}">
                            </div>
                            <div class="form-group">
                                <label for="Name">Age</label>
                                <input type="text" name="txtEmployeeNo" class="form-control" value="{{$users->age}}">
                            </div>
                            <div class="form-group">
                                <label for="Name">gender</label>
                                <input type="text" name="txtEmployeeNo" class="form-control" value="{{$users->path}}">
                            </div>
                            <div class="form-group">
                                <label for="Name">Email</label>
                                <input type="text" name="txtEmployeeNo" class="form-control" value="{{$users->email}}">
                            </div>
                            <div class="form-group">
                                <label for="userType">user type</label>
                                <select name="usertype" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>

                                </select>


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
