@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <!-- Current Tasks -->
        @if (isset($categories))
            @if (count($categories))
            <div class="panel panel-default">
                <div class="panel-heading">
                    Category
                </div>
                <div class="panel-body">
                    {{-- Display flash message --}}
                    @if (Session::has('success'))
                        <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ Session::get('success') }}</strong>
                        </div>
                    @endif
                    <div class="form-group">
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-success">
                                <a href="{{ route('categories.create') }}" title="create" style="color:white; text-decoration: none;"><i class="fa fa-btn fa-plus"></i>Create</a>
                            </button>
                        </div>
                    </div>
                    <table class="table table-striped task-table">
                        <thead>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>CREATED AT</th>
                            <th>UPDATED AT</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($categories as $row)
                            <tr>
                                <td class="table-text"><a href="{{ route('category.products', $row->id) }}" title=""><div>{{ $row->id }}</div></a></td>
                                <td class="table-text"><div>{{ $row->name }}</div></td>
                                <td class="table-text"><div>{{ $row->created_at }}</div></td>
                                <td class="table-text"><div>{{ $row->updated_at }}</div></td>
                                <!-- Action delete -->
                                <td>
                                    <form action="{{ route('categories.edit', $row->id)}}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-edit"></i>Edit
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('categories.destroy', $row->id) }}" method="POST">
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
                    {{ $categories->links() }}
                </div>
            </div>
            @endif
        @endif
    </div>
</div>
@endsection
