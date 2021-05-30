@extends('layouts.master')
@section('title')
    p7House| Confirm
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> ORDER CONFIRM</h4>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                ID USER
                            </th>
                            <th>
                                ID House
                            </th>
                            </thead>
                            <tbody>
                            @foreach($order as $data)
                                <tr>
                                    <td>
                                        {{$data->idUser}}
                                    </td>
                                    <td>
                                        {{$data->idHouse}}

                                    </td>
                                    <td class="text-right">
                                        <a href="/UpdateConfirm/{{$data->idUser}}/{{$data->idHouse}}" class="btn btn-success">Accept</a>
                                    </td>
                                    <td class="text-right">
                                        <a href="/DeleteConfirm/{{$data->idUser}}/{{$data->idHouse}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection
@section('scripts')
@endsection
