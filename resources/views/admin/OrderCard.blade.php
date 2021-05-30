
@extends('layouts.master')
@section('title')
    p7House| User
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> ORDER CARD</h4>
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
                                NAME
                            </th>
                            <th>
                                TYPE USER
                            </th>
                            <th>
                                ID CARD
                            </th>
                            <th class="text-right">
                                PRICE CARD
                            </th>
                            <th class="text-right">
                                QUANTITY CARD
                            </th>
                            </thead>
                            <tbody>
                            @foreach($order as $data)
                                <tr>
                                    <td>
                                        {{$data->idUser}}
                                    </td>
                                    <td>
                                        {{$data->nameUser}}

                                    </td>
                                    <td>
                                        {{$data->typeUser}}

                                    </td>
                                    <td>
                                        {{$data->idCard}}

                                    </td>
                                    <td>
                                        {{$data->cardPrice}}

                                    </td>
                                    <td>
                                        {{$data->CardQuantity}}

                                    </td>
                                    <td class="text-right">
                                        <a href="/Update/{{$data->idUser}}/{{$data->idCard}}" class="btn btn-success">Accept</a>
                                    </td>
                                    <td class="text-right">
                                        <a href="/Delete/{{$data->idUser}}/{{$data->idCard}}" class="btn btn-danger">Delete</a>
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

