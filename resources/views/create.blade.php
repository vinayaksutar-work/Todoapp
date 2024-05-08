@extends('layouts.app')

@section('title')
    Create Todo
@endsection

@section('content')

    <form action="store" method="post" class="mt-4 p-4" enctype="multipart/form-data">
        @csrf
        <div class="form-group m-3">
            <label for="name">Todo Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif

        </div>
        <div class="form-group m-3">
            <label for="description">Todo Description</label>
            <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
            @if ($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif
        </div>
        <div class="form-group m-3">
            <label for="status">Status</label>
            <select class="form-control" name="status">
                <option value="progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>
        <div class="form-group m-3 ">
            <label for="due_date">Due Date</label>
            <input type="date" class="form-control" name="due_date">
        </div>

        <div class="form-group m-3 ">
            <label for="urgent">Urgent</label>
            <input type="checkbox" class="form-control" name="urgent" value="1">
        </div>
        <div class="form-group m-3">
            <input type="submit" class="btn btn-primary float-end" value="Submit">
        </div>
    </form>

@endsection
