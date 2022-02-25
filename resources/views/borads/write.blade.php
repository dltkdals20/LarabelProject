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
    <form action="/tables" method = "POST">
            @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="title" name="title">
            <label for="floatingInput">게시판 제목</label>
        </div>
        <div class="form-floating">
            <input type="date" class="form-control" id="date" name= "date" placeholder="date">
        </div>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" name="content" id="floatingTextarea"></textarea>
            <label for="floatingTextarea">Comments</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">작성</button>
    </form>
  </div> 

@endsection()