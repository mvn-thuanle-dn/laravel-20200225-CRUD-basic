@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                New Category
            </div>
            <div class="panel-body">
                <!-- Display Validation Errors -->
                @include('common.errors')
                {{-- Display flash message --}}
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ Session::get('success') }}</strong>
                    </div>
                @endif
                <!-- New Task Form -->
                <form action="{{ route('categories.store') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <!-- Task Name -->
                    <div class="form-group">
                        <label for="product-name" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" id="product-name" class="form-control" value="{{ old('name')}}">
                        </div>
                    </div>
                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-success">
                            <i class="fa fa-btn fa-plus"></i>Add Category
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
