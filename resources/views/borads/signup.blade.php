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
    small.userid {
      color:red;
    }
    small.password {
      color:red;
    }
    small.ph {
      color:red;
    }
</style>
@section('title')

@endsection()

@section('content')     
<main class="form-signin">
  <form action="/borads" method = "POST">
       @csrf
    <h1 class="h3 mb-3 fw-normal">회원가입</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="text" name="userId" placeholder="아이디를 입력해주세요">
      <label for="floatingInput">userID</label>
    </div>
        @error('userId')
        <small class="userId">{{'미입력 및 중복된 아이디입니다.'}}</small>
        @enderror
    <div class="form-floating">
      <input type="password" class="form-control" id="password" name="userPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
        @error('userPassword')
        <small class="password">{{'비밀번호를 입력해주세요'}}</small>
        @enderror
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="userPh" maxlength="11"  placeholder="01045453838">
      <label for="floatingInput">phoneNumber</label>
    </div>
        @error('userPh')
        <small class="ph">{{'핸드폰번호를 입력해주세요. "-"제외'}}</small>
        @enderror
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
  </form>
</main>
    <!-- 버튼을 클릭하면 아이디 중복값을 찾아주고, 메시지를 알려주는 역할. alert창이 안되서 실패-->
    <!-- <script>
      $('idcheck').click( function() {
        alert("ddddd")
    } );
    </script> -->
@endsection()