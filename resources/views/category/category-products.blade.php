@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <!-- Current Tasks -->
        @if (isset($data))
            @if (count($data))
            <div class="panel panel-default">
                <div class="panel-heading">
                    Products by Category {{ $category->id }}
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
                            @foreach ($data as $row)
                            <tr>
                                <td class="table-text"><div>{{ $row->id }}</div></td>
                                <td class="table-text"><div>{{ $row->name }}</div></td>
                                <td class="table-text"><div>{{ $row->quantity }}</div></td>
                                <td class="table-text"><div>{{ $row->description }}</div></td>
                                <td class="table-text"><div>{{ $category->name }}</div></td>
                                <td class="table-text"><div>{{ $row->created_at }}</div></td>
                                <td class="table-text"><div>{{ $row->updated_at }}</div></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- pagination --}}
                    {{ $data->links() }}
                </div>
            </div>
            @elseif (!count($data))
            <div class="panel panel-default">
                <div class="panel-heading">
                    Products by Category {{ $category->id }}
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
                                <td class="table-text" colspan="7"><div class="text-center"><strong>With this category in database not exist any record.</strong></div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        @endif
    </div>
</div>
@endsection
