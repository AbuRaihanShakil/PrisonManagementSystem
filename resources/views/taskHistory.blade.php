@extends('layouts.app')
@section('content')
    <div class="container"> 
        <a href="{{ URL::previous() }}" class="btn btn-dark">Go Back</a>
        <Table class="table">
            <thead>
                <th>Task</th>
                <th>Status</th>
                <th>Points</th>
                <th>Date</th>
            </thead>
            <tbody>
                @foreach ($tasks as $task   )
                    <tr>
                        <td>{{ $task->task }}</td>
                        @if ($task->status==1)
                            <td class=""><span class="badge badge-pill badge-success">Completed</span></td>
                        @else
                            <td><span class="badge badge-pill badge-danger">Failed</span></td>
                        @endif
                        <td>{{ $task->points }}</td>
                        <td>{{ $task->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </Table>
    </div>
@endsection