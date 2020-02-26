@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <!-- Current Tasks -->
        @if (isset($products))
            @if (count($products))
            <div class="panel panel-default">
                <div class="panel-heading">
                    Products
                </div>
                {{-- Display flash message --}}
                @if (Session::has('message'))
                    <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>{{ Session::get('message') }}</strong>
                    </div>
                @endif
                <div class="form-group">
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-success">
                            <a href="{{ route('products.create') }}" title="create" style="color:white; text-decoration: none;"><i class="fa fa-btn fa-plus"></i>Create</a>
                        </button>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>QUANTITY</th>
                            <th>DESCRIPTION</th>
                            <th>CREATED AT</th>
                            <th>UPDATED AT</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($products as $row)
                            <tr>
                                <td class="table-text"><div>{{ $row->id }}</div></td>
                                <td class="table-text"><div>{{ $row->name }}</div></td>
                                <td class="table-text"><div>{{ $row->quantity }}</div></td>
                                <td class="table-text"><div>{{ $row->description }}</div></td>
                                <td class="table-text"><div>{{ $row->created_at }}</div></td>
                                <td class="table-text"><div>{{ $row->updated_at }}</div></td>
                                <!-- Action delete -->
                                <td>
                                    <form action="{{ route('products.edit', $row->id)}}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-edit"></i>Edit
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('products.destroy', $row->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- pagination --}}
                    {{ $products->links() }}
                </div>
            </div>
            @endif
        @endif
    </div>
</div>
@endsection
