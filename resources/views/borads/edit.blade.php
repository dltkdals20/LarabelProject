@extends('layout')
<style>
    div.writetable {
       margin:auto;
       width :700px;
       margin-top :70px;
       
    }
    input#date.form-control {
        margin-bottom:20px;
    }
    textarea#floatingTextarea.form-control{
        height : 250px;
    }

</style>
@section('title')

@endsection()

@section('content')  
<div class="writeTable">  
    <form action="/tables/{{$table->id}}" method = "POST">
            @method('PUT')
            @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="title" name="title" value="{{$table->title}}" />
            <label for="floatingInput">게시판 제목</label>
        </div>
        <div class="form-floating">
            <input type="date" class="form-control" id="date" name= "date" placeholder="date" value="{{$table->date}}"/>
        </div>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" name="content" id="floatingTextarea">{{$table->content}}</textarea>
            <label for="floatingTextarea"></label>
        </div>
        <button id="btn">수정</button>
    </form>
  </div> 

@endsection()