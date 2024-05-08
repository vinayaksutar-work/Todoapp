@extends('layouts.app')
@section('title')
    My Todo App
@endsection
@section('content')

<div class="">
    <table class="table table-bordered " id="myTable">
        <thead>
          <tr>
            <th>Sno</th>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Priority</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($todos as $todo)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td><a href="details/{{$todo->id}}">{{$todo->name}}</a></td>
            <td>{{ $todo->description }}</td>
            <td>{{ $todo->status}}</td>
            <td>{{ $todo->due_date }}</td>
            <td>{{ $todo->urgent ? 'Urgent' : 'Not Urgent' }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</div>

@endsection
