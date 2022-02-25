@extends('layout')
<style>
    main.form-signin {
        margin:auto;
        width :300px;
        margin-top :100px;
    }
    h1.h3.mb-3.fw-normal {
        text-align:center;
    }
</style>
@section('title')

@endsection()

@section('content')     
<main class="form-signin">
  <form action="/login" method = "POST">
     @csrf
    <h1 class="h3 mb-3 fw-normal">로그인</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="text" name="userId" placeholder="아이디를 입력해주세요">
      <label for="floatingInput">userID</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" name="userPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    @if (!empty($result))
      <p>{{ $result }}</p>
    @endif    
    <button class="w-100 btn btn-lg btn-primary" type="submit">로그인</button>
    <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
  </form>
</main>
@endsection()