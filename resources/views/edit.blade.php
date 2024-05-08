@extends('layouts.app')
@section('title')
    Edit Todo
@endsection
@section('content')

<form action="/update/{{$todo->id}}" method="post" class="mt-4 p-4">
    @csrf
    <div class="form-group m-3">
        <label for="name">Todo Name</label>
        <input type="text" class="form-control" value="{{$todo->name}}" name="name">
    </div>
    <div class="form-group m-3">
        <label for="description">Todo Description</label>
        <textarea class="form-control" name="description" rows="3"> {{$todo->description}} </textarea>
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
        <input type="date" class="form-control" name="due_date" value="{{ $todo->due_date }}">
    </div>
    <div class="form-group m-3 ">
        <label for="urgent">Urgent</label>
        <input type="checkbox" name="urgent" value="1" {{ $todo->urgent ? 'checked' : '' }}>
    </div>
    <div class="form-group m-3">
        <input type="submit" class="btn btn-primary float-end" value="Update">
    </div>
</form>

@endsection
