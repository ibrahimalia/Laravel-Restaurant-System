
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

                        <form action='/role-meals-update/{{$meals->id}}' method="POSt">
{{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="Name">Name food</label>
                                <input type="text" name="name" class="form-control" value="{{$meals->nameMeal}}">
                            </div>
                            


                            <div class="form-group">
                                <label for="Name">describe food</label>
                                <input type="text" name="describe" class="form-control" value="{{$meals->descriptionMeal}}">
                            </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label"> image food:</label>
                            <input type="file"  name="image" class="form-control" id="recipient-name" value="{{$meals->image}}">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">  food  category_id</label>
                            <input type="text"  name="category_id" class="form-control" id="recipient-name" value="{{$meals->category_id}}">
                        </div>
                        <div >
                        <input type="file"  name="image" class="form-control" id="recipient-name" value="{{$meals->image}}">
                        </div>
                       <div class="form-group">
                            <label for="recipient-name" class="col-form-label"> price food</label>
                            <input type="number" name="price" class="form-control" id="recipient-name" value="{{$meals->price}}">
                        </div> 

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">	avgRate</label>
                            <input type="number" name="avgRate" class="form-control" id="recipient-name" value="{{$meals->avgRate}}">
                        </div> 
                       <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Inter calories food</label>
                            <input type="number" name="calories" class="form-control" id="recipient-name" value="{{$meals->calories}}">
                        </div> 
                         <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Inter fat food</label>
                            <input type="number" name="fat" class="form-control" id="recipient-name" value="{{$meals->fat}}">
                        </div> 
                         <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Inter brotien food</label>
                            <input type="number" name="brotien" class="form-control" id="recipient-name" value="{{$meals->protein}}">
                        </div> 
                         <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Inter kerbohedrat food</label>
                            <input type="number" name="kerbohedrat" class="form-control" id="recipient-name" value="{{$meals->carbohydrates}}">
                        </div> 

                           
                            <div class="form-check">

                                <button type="submit" class="btn btn-primary">update</button>
                                <a href="/role-meals-show/{{$meals->category_id}}" class="btn-danger btn">cansel</a>
                            </div>
                        </form>



                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
