@extends('layouts.app')
@section('content')
    <div class="container">
        @if ($prisoner->release==0)
        <a href="{{ route('prisoner.info',$prisoner->id)}}" class="btn btn-dark">Go Back</a>
        @else
            
        @endif
        
        <form action="{{ route('store.task',$prisoner->id) }}" method="POST">
            <label for="task">Task</label>
            @csrf
            <input name="task" type="text">
            <label for="Points">Points</label>
            <input name="points" type="number" min="5" max="100" step="5">
            <button class="btn btn-success">
                Add Task
            </button>
        </form>

@if (count($tasks)>0)
<Table class="table">
    <thead>
        <th>Task</th>
        <th>Status</th>
        <th>Points</th>
    </thead>
    <tbody>
        @foreach ($tasks as $task   )
            <tr>
                <td>{{ $task->task }}</td>
                <td>pending</td>
                <td>{{ $task->points }}</td>
                <td>
                    <a href="{{ route('complete.task',[$task->id,$prisoner->id]) }}" class="btn btn-success">Complete</a> 
                    <a href="{{ route('fail.task',[$task->id,$prisoner->id]) }}" class="btn btn-danger">Failed</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</Table>
@else
    <h4> No Pending Task Available</h4>
@endif

    </div>
@endsection