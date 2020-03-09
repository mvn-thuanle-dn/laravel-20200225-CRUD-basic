@extends('layouts.app')
@section('title', '')
@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Products
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>QUANTITY</th>
                            <th>DESCRIPTION</th>
                            <th>CATEGORY</th>
                            <th>CREATED AT</th>
                            <th>UPDATED AT</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="table-text"><div>{{ $product->id }}</div></td>
                                <td class="table-text"><div>{{ $product->name }}</div></td>
                                <td class="table-text"><div>{{ $product->quantity }}</div></td>
                                <td class="table-text"><div>{{ $product->description }}</div></td>
                                <td class="table-text"><div>{{ $name }}</div></td>
                                <td class="table-text"><div>{{ $product->created_at }}</div></td>
                                <td class="table-text"><div>{{ $product->updated_at }}</div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
@endsection
