@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Category
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>CREATED AT</th>
                            <th>UPDATED AT</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="table-text"><a href="{{ route('category.products', $category->id) }}" title=""><div>{{ $category->id }}</div></a></td>
                                <td class="table-text"><div>{{ $category->name }}</div></td>
                                <td class="table-text"><div>{{ $category->created_at }}</div></td>
                                <td class="table-text"><div>{{ $category->updated_at }}</div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
@endsection
