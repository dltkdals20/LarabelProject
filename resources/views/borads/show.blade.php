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
    div.btn {
        display :flex;
    }
    a.btn.btn-primary.pull-right {
        height: 37px;
    }
    button.btn.btn-primary.pull-right {
        margin-left : 10px;
    }

</style>
@section('title')

@endsection()

@section('content')  
<div class="writeTable">  
    <form action="/tables" method = "POST">
            @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="title" name="title" value="{{$table->title}}" disabled />
            <label for="floatingInput">게시판 제목</label>
        </div>
        <div class="form-floating">
            <input type="date" class="form-control" id="date" name= "date" placeholder="date" value="{{$table->date}}" disabled />
        </div>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" name="content" id="floatingTextarea" disabled ></textarea>
            <label for="floatingTextarea">{{$table->content}}</label>
        </div>
    </form>
        <div class="btn">
            <a href="/tables/{{$table->id}}/edit" class="btn btn-primary pull-right">수정</a>
            <form method="POST" action="/tables/{{$table->id}}" >
                @method('DELETE')
                @csrf      
                <button class="btn btn-primary pull-right">삭제</button>
            </form>    
        </div>
        
  </div> 

@endsection()