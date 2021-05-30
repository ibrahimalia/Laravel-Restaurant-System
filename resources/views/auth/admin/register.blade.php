
@extends('layouts.master')
@section('title')
    yazan
    @endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-header">
                    <h4 class="card-title"> Simple Table</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                Name
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                User Type
                            </th>
                            <th class="text-right">
                                Edit
                            </th>
                            <th class="text-right">
                                Delete
                            </th>
                            </thead>
                            <tbody>
                            @foreach($users as $row)
                            <tr>
                                <td>
                                   {{$row->name}}
                                </td>
                                <td>
                                    {{$row->phone}}

                                </td>
                                <td>
                                    {{$row->email}}
                                </td>
                                <td>
                                    {{$row->usertype}}

                                </td>
                                <td class="text-right">
                                <a href="/role-register-edit/{{$row->id}}" class="btn btn-primary">edite</a>
                                </td>
                                <td class="text-right">
                                    <form action="/role-register-delete/{{$row->id}}" method="post">
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