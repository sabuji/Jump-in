<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Validator;
use Auth;

class TasksController extends Controller
{
    //クラスが呼ばれたら最初に実行する処理
   public function __construct(){
       $this->middleware('auth');
   }
    //登録処理関数
   public function store(Request $request) {
       //バリデーション
   $validator = Validator::make($request->all(), [
       'task' => 'required|max:255',
       'deadline' => 'required'
   ]);
   //バリデーション:エラー
   if ($validator->fails()) {
       return redirect('/')
           ->withInput()
           ->withErrors($validator);
   }
   // Eloquentモデル
   $task = new Task;
   $task->user_id = Auth::user()->id;
   $task->task = $request->task;
   $task->deadline = $request->deadline;
   $task->comment = $request->comment;
   $task->save();
   //「/」ルートにリダイレクト
   return redirect('/');
       
       //
   }

   //表示処理関数
   public function index() {
       $tasks = Task::where('user_id',Auth::user()->id)
               ->orderBy('deadline', 'asc')
               ->get();
   return view('tasks', [
       'tasks' => $tasks
   ]);
       //
   }

   //更新画面表示関数
   public function edit($task_id) {
   $task = Task::where('user_id',Auth::user()->id)->find($task_id);
       return view('tasksedit', ['task' => $task]);
       //
   }

   //更新処理関数
   public function update(Request $request) {
       //バリデーション
   $validator = Validator::make($request->all(), [
       'id' => 'required',
       'task' => 'required|max:255',
       'deadline' => 'required'
   ]);
   //バリデーション:エラー
   if ($validator->fails()) {
       return redirect('/')
           ->withInput()
           ->withErrors($validator);
   }
   //データ更新処理
   $task = Task::where('user_id',Auth::user()->id)
               ->find($request->id);
   $task->task   = $request->task;
   $task->deadline = $request->deadline;
   $task->comment = $request->comment;
   $task->save();
   return redirect('/');
       //
   }

   //削除処理関数
   public function destroy(Task $task) {
       $task->delete();
   return redirect('/');
       //
   }
 
 
    //
}
