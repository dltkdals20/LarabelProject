<?php

namespace App\Http\Controllers;

//html에서 name값을 가져와서 아마 키 벨류 형식으로 request 객체에 담는 듯함.
use Illuminate\Http\Request;
//model를 사용할때 쓰는 어노테이션
use App\Models\Task;

class TaskController extends Controller
{
  
    public function index ()
    {
       $tasks = Task::all();
        return view('tasks.index',[
           //앞에 있는 'tasks'가 key이고 뒤에 있는 $tasks가 벨류. 
            'tasks' => $tasks
        ]);

    }

    public function create ()
    {
        return view('tasks.create');

    }

    public function store (Request $request)
    {
        //title은 name값이 title
        //content는 name값이 content
        // $request->input('title');
        // $request->input('content');
        $task = Task::create([
            'name' => $request->input('title'),
            'body'  => $request->input('content')
        ]);
        return redirect('/tasks/'.$task->id);
    }

    public function show(Task $task)
    {
        return view('tasks.show',[
            'task' => $task
        ]);
    }
    public function edit(Task $task)
    {
        return view('tasks.edit', [
            'task' =>$task
        ]);
    }
    public function update(Task $task)
    {
        $task->update([
            'name' => request('title'),
            'body' => request('content')
        ]);

        return redirect('/tasks/'.$task->id);
    }
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('tasks');
    }
}
