<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sign;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SignController extends Controller
{
    //라우트에서 index로 연결받아 회원가입 signup.blade.php를 보여주는 역할
    public function index ()
    {
       return view('borads.signup');

    }
     //라우트에서 login으로 연결받아  login.blade.php를 보여주는 역할
     public function login ()
     {
        return view('borads.login');
 
     }

    public function store (Request $request)
    {
       
        //회원가입에서 사용자 정보를 DB에 저장하기 위해서
        //1.model를 만들어 사용자 정보를 model에 저장한 후
        //2.db에 저장할때 model 전체를 저장하면 되는데,
        //3.주의 점 Sign <-모델이름, create<-insert할때 정해진 규칙으로 꼭 create로 적어줘야 함.
        
        $validated = $request->validate([
            //required뒤에 unique:테이블 이름을 작성하게 되면 따로 중복 버튼을 만들 필요없이 유효검사를 하여 에러를 알려줌.
            //하지만 미 입력으로 인한 에러메시지와, 아이디 중복 에러메시지를 따로 분리해서 보내야 하는데 그건 조금 더 고민해보는 걸로.
            'userId' => 'required|unique:signs', 
            'userPassword' => 'required',
            'userPh' => 'required',
        ]);
        
        //해당 방법으로는 Hash가 되지 않아 밑에 model를 이용해서 다시 사용자의 가입정보를 db에 저장함.
        // $Sign = Sign::create(request(['userId',('userPassword'),'userPh']));
        // return redirect('login');
       
        // //먼저 사용자가 입력한 아이디가 잇는지 검사를 하고 
        // $sign = Sign::where('userId', '=', $request->userId)->first();
        // //사용자가 입력한 아이디가 중복이 되었다고 하면
        // if($sign){
        //     return back()->with('fail',"중복된 아이디 입니다.");  
        
            $sign = new Sign();
            $sign -> userId = $request->userId;
            $sign -> userPassword = Hash::make($request->userPassword);
            $sign -> userPh = $request->userPh;
            $res = $sign ->save();   
    }

    public function find (Request $request)
    {

          
        //사용자가 입력한 아이디와 비밀번호를 변수에 넣고
        $userId = $request->input('userId');
        $userPassword =$request->input('userPassword');


        // 'userId'가 컬럼 이름.
        // 쿼리문에 작성을 함.
        
        $users = DB::table('signs')->where([
            ['userId', '=', $userId],
            ['userPassword', '=', $userPassword],
        ])->count();
        
        if($users == '1'){
            //세션을 만들고 싶은데..
            //회원가입 당시의 pk 값과
            //사용자의 아이디 값.
            // $userId = DB::table('signs')->where('userId', $userId)->value('id');
            $date =$request->input();
            $request->session()->put('userId',$date['userId']);
            // $request->session()->put('userPk',$userId->id);
            return redirect('tables');   
        } else{
            //로그인 실패 메시지를 보여줘야 함.
            return view('borads.login',['result'=>'아이디와 비밀번호를 확인해주세요.']);
        }
    }
    //로그아웃.
    public function logout ()
    {
        if(Session::has('userId')){
            Session::pull('userId');
            return redirect('/login');
        }

    }
}
