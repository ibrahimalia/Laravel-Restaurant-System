
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

                        <form action='/about-update/{{$abouts->id}}' method="POSt">
{{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input type="text" name="title" class="form-control" value="{{$abouts->title}}">
                            </div>
                            <div class="form-group">
                                <label for="Sub Title"> Sub Title</label>
                                <input type="text" name="subtitle" class="form-control" value="{{$abouts->subtitle}}">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Description:</label>
                                <textarea  name="description" class="form-control" id="message-text" >{{$abouts->description}}</textarea>
                            </div>


                            <div class="form-check">

                                <button type="submit" class="btn btn-primary">update</button>
                                <a href='/abouts' class="btn-danger btn">cansel</a>
                            </div>
                        </form>



                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
