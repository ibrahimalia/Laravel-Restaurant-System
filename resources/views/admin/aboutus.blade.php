
@extends('layouts.master')
@section('title')
    yazan
@endsection
@section('content')

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New About Us</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/save-abouts" method="POST">
                    {{csrf_field()}}
                <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Title:</label>
                            <input type="text"  name="title" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Sub Title:</label>
                            <input type="text" name="subtitle" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Description:</label>
                            <textarea  name="description" class="form-control" id="message-text"></textarea>
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


    <!-- Modal Delete -->
    <div class="modal fade" id="deletemodalpop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form  id="delete_modal_form" action="" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                <div class="modal-body">

<input type="hidden"  id="delete_aboutus_id">
<h5>Are you sure you want delete </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Yes .Delete it</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> About Us
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" >Add</button>
                    </h4>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <style>
                    .w-10p{
                        width: 10% !important;
                    }
                </style>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead class=" text-primary">
                            <th class="w-10p">
                                Id
                            </th>
                            <th class="w-10p">

                            Title
                            </th>
                            <th class="w-10p">

                            Sub Title
                            </th>
                            <th style="height: available" >

                            Description
                            </th>
                            <th class="text-right w-10p">
                                Edit
                            </th>
                            <th class="text-right w-10p">
                                Delete
                            </th>
                            </thead>
                            <tbody>
                            @foreach($abouts as $data)
                                <tr>
                                    <td>
                                        {{$data->id}}
                                    </td>


                                    <td>
                                        {{$data->title}}

                                    </td>


                                    <td>
                                        {{$data->subtitle}}
                                    </td>

                                    <td>
                                        <div style="height:30px; overflow: hidden" >
                                        {{$data->description}}
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{url('about-edit/'.$data->id)}}" class="btn btn-primary">edite</a>
                                    </td>
                                    <td class="text-right">

                                        <a href="javescript:void(0)" class="btn btn-primary deletebtn" data-toggle="modal" data-target="#deleteModal">Delete</a>

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
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();

        $('#myTable').on('click','.deletebtn' ,function () {
            $tr = $(this).closest('tr');
            var data =$tr.children("td").map(function () {
                return $(this).text();

            }).get();
            console.log(data);
            $('#delete_aboutus_id').val(data[0]);
            $('#delete_modal_form').attr('action','/about-delete/'+data[0]);
            $('#deletemodalpop').modal('show');

        });

    } );
</script>

@endsection