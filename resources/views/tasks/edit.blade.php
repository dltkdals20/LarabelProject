@extends('layout')
<style>
   input#title{
     border: solid;
   } 
   textarea#content{
     border: solid;
   }
   button#btn {
      background-color: blue; 
   }
</style>
@section('title')
 createTasks
@endsection()

@section('content')
<h1 class="font-bold text-3xl">create Task</h1>
<form action="/tasks/{{$task->id}}" method = "POST">
    @method('PUT')
    @csrf
        <label class="block" for="title">Title</label>
    <div>
        <input type="text" name="title" id ="title" value="{{$task->name}}">
    </div>
    <div>
        <label class="block" for="Body">Body</label>  
    </div>
    <div>
        <textarea name="content" id="content" cols="30" rows="10">{{$task->body}}</textarea>  
    </div>
    <div>
    
        <button id="btn">submit</button>
    </div>
</form>
@endsection()