
@extends('layouts.master')
@section('title')
    yazan
    @endsection
@section('content')

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New OFFERS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/role-add-meals/{{$idCategory}}" method="POST"  enctype="multipart/form-data" >

                    {{csrf_field()}}
                <div class="modal-body">

                              

                        
                     
                           <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Inter name food</label>
                            <input type="text"  name="name" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Inter describe food</label>
                            <input type="text"  name="describe" class="form-control" id="recipient-name">
                        </div>
                     
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Inter image food:</label>
                            <input type="file"  name="image" class="form-control" id="recipient-name">
                        </div>
                          <div >
                        <input type="file"  name="image" class="form-control" id="recipient-name">
  </div>
                       <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Inter price food</label>
                            <input type="number" name="price" class="form-control" id="recipient-name">
                        </div> 
                       <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Inter calories food</label>
                            <input type="number" name="calories" class="form-control" id="recipient-name">
                        </div> 
                         <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Inter fat food</label>
                            <input type="number" name="fat" class="form-control" id="recipient-name">
                        </div> 
                         <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Inter brotien food</label>
                            <input type="number" name="brotien" class="form-control" id="recipient-name">
                        </div> 
                         <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Inter kerbohedrat food</label>
                            <input type="number" name="kerbohedrat" class="form-control" id="recipient-name">
                        </div> 

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card-header">
                    <h4 class="card-title"> Show Table
                        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal" >Add</button>
                    </h4>
                   
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                ID
                            </th>
                          
                            <th>
                                category_id
                            </th>
                            <th>
                               Name Meal
                            </th>
                             <th>
                               Description Meal
                            </th>
                               <th>
                               image
                            </th>
                               <th>
                                price
                            </th>
                               <th>
                                avgRate
                            </th>
                               <th>
                                calories
                            </th>
                               <th>
                                fat
                            </th>
                            <th>
                                protein
                            </th>
                            <th>
                                carbohydrates
                            </th>
                         
                            <th class="text-right">
                                Edit
                            </th>
                            <th class="text-right">
                                Delete
                            </th>
                            </thead>
                            <tbody>
                            @foreach($meals as $row)
                            <tr>
                            <td>
                                   {{$row->id}}
                                </td>
                                <td>
                                   {{$row->category_id}}
                                </td>
                             
                                <td>
                                    {{$row->nameMeal}}
                                </td>
                                   <td>
                                    {{$row->descriptionMeal}}
                                </td>
                                   <td>
                                    {{$row->image}}
                                </td>
                              
                                 <td>
                                   {{$row->price}}
                                </td>
                                <td>
                                   {{$row->avgRate}}
                                </td>
                             
                                <td>
                                    {{$row->calories}}
                                </td>
                                   <td>
                                    {{$row->fat}}
                                </td>
                                   <td>
                                    {{$row->protein}}
                                </td>
                                <td>
                                    {{$row->carbohydrates}}
                                </td>
                                <td class="text-right">
                                <a href="/role-meals-edit/{{$row->id}}" class="btn btn-primary">edite</a>
                                </td>



                                <td class="text-right">
                                    <form action="/role-meals-delete/{{$row->id}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger">delete</button>

                                    </form>
                                </td>

                              

                            </tr>

@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-header">
                    <h4 class="card-title"> Offers on Plain Background</h4>
                    <p class="category"> Here is a subtitle for this table</p>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection