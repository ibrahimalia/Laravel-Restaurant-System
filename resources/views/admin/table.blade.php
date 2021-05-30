
@extends('layouts.master')
@section('title')
    yazan
    @endsection
@section('content')

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Table Us</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/role-add-table" method="POST">
                    {{csrf_field()}}
                <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Capacity:</label>
                            <input type="text"  name="capacity" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">TableFee:</label>
                            <input type="text" name="tableFee" class="form-control" id="recipient-name">
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
                                Capacity
                            </th>
                            <th>
                                TableFee
                            </th>
                          
                            <th class="text-right">
                                Edit
                            </th>
                            <th class="text-right">
                                Delete
                            </th>
                            </thead>
                            <tbody>
                            @foreach($table as $row)
                            <tr>
                            <td>
                                   {{$row->id}}
                                </td>
                                <td>
                                   {{$row->capacity}}
                                </td>
                             
                                <td>
                                    {{$row->tableFee}}
                                </td>
                              
                              
                                <td class="text-right">
                                <a href="/role-table-edit/{{$row->id}}" class="btn btn-primary">edite</a>
                                </td>



                                <td class="text-right">
                                    <form action="/role-table-delete/{{$row->id}}" method="post">
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
                    <h4 class="card-title"> Table on Plain Background</h4>
                    <p class="category"> Here is a subtitle for this table</p>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection