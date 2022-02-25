@extends('layout')
@section('title','Task detail')

@section('content')
  <div class="px-64">
    <div class="flex">
      <h1 class="font-bold text-3xl flex-1">Task</h1> 
      <div>
      <a href="/tasks/{{$task->id}}/edit">
        <button class="flex-initial">Edit</button>
      </a>
       <form method="POST" action="/tasks/{{$task->id}}" >
          @method('DELETE')
          @csrf      
        <button class="flex-initial">delete</button>
      
       </form>
      </div>
     
    </div>
    Title: {{$task->name}} <small class="float-right">Created at {{$task->created_at}}</small><br>
    Body
    <div class="border">{{$task->body}}</div>
  </div>

@endsection()