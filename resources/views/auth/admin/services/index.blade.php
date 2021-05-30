
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
                <form action="/service-edit/{id}" method="POST">
                    {{csrf_field()}}
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label"> NAME:
                            </label>
                            <!-- Hidden Input Professor Id -->
                            <input type="hidden" name="id" />
                            <input type="text"  name="name" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Status:</label>
                            <input type="text" name="status" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Description:</label>
                            <input type="text" name="description" class="form-control" >
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
                    <h4 class="card-title"> Category List
                        <a href="/service-cat-create" class="btn btn-primary float-right">Add</a>                    </h4>
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

                                Name
                            </th>
                            <th class="w-10p">

                                Status
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
                            @foreach($services as $row)


                             <tr>
                                 <input type="hidden"  id="delete_aboutus_id" value="{{$row->id}}">
                                    <td>
                                        {{$row->id}}
                                    </td>
                                    <td>
                                        {{$row->name}}

                                    </td>
                                    <td>
                                        {{$row->status}}
                                    </td>
                                    <td>
                                        {{$row->description}}

                                    </td>
                                    <td class="text-right">
                                        <a href="/service-edit/{{$row->id}}" class="btn btn-primary">edite</a>

                                    <!--

                                        <button data-target="exampleModal" class="waves-effect waves-light btn btn-info   yellow darken-2" id="{{$row->id}}"
                                        name="{{$row->name}}"  status="{{$row->status}}" description="{{$row->description}}">
                                            edite
                                        </button>
-->
                                    </td>
                                 <meta name="csrf-token" content="{{ csrf_token() }}">


                                    <td class="text-right">
                                        <button type="button"  class="btn btn-primary deleteRecord" data-id="{{ $row->id }}"  data-toggle="modal" data-target="#deleteModal">Delete</button>

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
    $(document).ready(function() {
        $('button.darken-2').click(function(event) {
            var id = $(this).attr('id');
            var name = $(this).attr('name');
            var status = $(this).attr('status');
            var description = $(this).attr('description');

            var oModalEdit = $('#exampleModal');
            oModalEdit.find('input[name="id"]').val(id);
            oModalEdit.find('input[name="name"]').val(name);
            oModalEdit.find('input[name="status"]').val(status);
            oModalEdit.find('input[name="description"]').val(description);

 //           oModalEdit.find(   $("#myTextarea").val(description));


            oModalEdit.modal();
        });

    });
</script>




<!-- Modal Delete
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
            $('#delete_modal_form').attr('action','/service-delete/'+data[0]);
            $('#deletemodalpop').modal('show');

        });

    } );
</script>
 -->


<script>
    $(document).ready(function() {
        $('button.deleteRecord').click(function(event) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

var  service_id=$(this).closest("tr").find('.delete_aboutus_id').val();
alert(service_id)
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {

                        var data ={
                            "token":$('input[name="csrf-token"]').val(),
                            "id":service_id,
                        };

                        $.ajax(
                            {
                                url: "users/"+id,
                                type: 'DELETE',
                                data: {
                                    "id": id,
                                    "_token": token,
                                },
                                success: function (){
                                    swal("Poof! Your imaginary file has been deleted!", {
                                        icon: "success",
                                    });
                                }
                            });

                    }
                });
        });
    });
</script>
@endsection
















<