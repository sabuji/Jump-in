@extends('layouts.app')
@section('content')
    <div class="panel-body">
        <!-- バリデーションエラーの表示に使用するエラーファイル-->
        @include('common.errors')
        <!-- タスク登録フォーム -->
        <form action="{{ url('tasks') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <!-- タスク名 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="task" class="col-sm-3 control-label">Task</label>
                    <input type="text" name="task" id="task" class="form-control">
                </div>
                <!-- deadline -->
       <div class="col-sm-6">
           <label for="deadline" class="col-sm-3 control-label">Deadline</label>
           <input type="date" name="deadline" id="deadline" class="form-control">
       </div>
       <!-- comment -->
       <div class="col-sm-6">
           <label for="comment" class="col-sm-3 control-label">Comment</label>
           <input type="text" name="comment" id="comment" class="form-control">
       </div>
                
                
            </div>
            <!-- タスク登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">Save</button>
                </div>
            </div>
        </form>
        <!-- この下に登録済みタスクリストを表示 -->
        <!-- 表示領域 -->
@if (count($tasks) > 0)
   <div class="panel panel-default">
       <div class="panel-heading">タスクリスト</div>
       <div class="panel-body">
           <table class="table table-striped task-table">
               <!-- テーブルヘッダ -->
               <thead>
                   <th>タスク</th>
                   <th>&nbsp;</th>
               </thead>
               <!-- テーブル本体 -->
               <tbody>
                   @foreach ($tasks as $task)
                       <tr>
                           <td class="table-text">
                               <div>{{ $task->task }}</div>
                           </td>
                           <td class="table-text">
           <div>{{ $task->deadline }}</div>
       </td>
       <td class="table-text">
           <div>{{ $task->comment }}</div>
       </td>
       <td>
           <!-- 更新ボタン -->
           <form action="{{ url('tasksedit/'.$task->id) }}" method="POST">
               {{ csrf_field() }}
               <button type="submit" class="btn btn-primary">更新</button>
           </form>
       </td>
                           
                           
                           
                           <td>
                               <!-- 削除ボタン -->
                               <form action="{{ url('task/'.$task->id) }}" method="POST">
                       {{ csrf_field() }}
                       <button type="submit" class="btn btn-danger">削除</button>
                   </form>
                               
                           </td>
                       </tr>
                   @endforeach
              </tbody>
           </table>
       </div>
   </div>
@endif
<!-- ここまでタスクリスト -->
        
        
    </div>
@endsection