@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        @include('common.errors')
        <form action="{{ url('tasks/update') }}" method="POST">
            <!-- task -->
            <div class="form-group">
                <label for="task">Task</label>
                <input type="text" id="task" name="task" class="form-control" value="{{$task->task}}">
            </div>
            <!-- deadline -->
            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="date" id="deadline" name="deadline" class="form-control" value="{{$task->deadline}}">
            </div>
            <!-- comment -->
            <div class="form-group">
                <label for="comment">Comment</label>
                <input type="text" id="comment" name="comment" class="form-control" value="{{$task->comment}}">
            </div>
            <!-- Saveボタン/Backボタン -->
            <div class="well well-sm">
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-link pull-right" href="{{ url('/') }}">Back</a>
            </div>
            <!-- id値を送信 -->
            <input type="hidden" name="id" value="{{$task->id}}" />
            {{ csrf_field() }}
        </form>
    </div>
</div>
@endsection