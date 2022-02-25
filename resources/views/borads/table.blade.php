@extends('tableLayout')

@section('title')

@endsection()

@section('content') 
<div class="btn">
<a href="/tables/create" class="btn btn-primary pull-right">글쓰기</a>
  <a href="/logout" class="btn btn-primary pull-right">로그아웃</a>    
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">번호</th>
      <th scope="col">내용</th>
      <th scope="col">작성자</th>
      <th scope="col">작성날짜</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
    
      <td scope="row">{{$user->id}}</td>
      <td> <a href="/tables/{{$user->id}}">{{$user->title}}</a></td>
      <td>{{session('userId')}}</td>
      <td>{{$user->date}}</td>
    </a>
    </tr>
    @endforeach 
  </tbody>
</table>

  <!-- [!! $users->render() !!] -->

@endsection()