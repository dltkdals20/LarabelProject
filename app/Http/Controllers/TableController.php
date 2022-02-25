<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
  //1.로그인 후 바로 보여주는 게시판.
  //2.추구 게시글을 전체 불러와서 게시글을 보여줘야 함.
  //3.페이징 작업도 해야함.
  //4.offset,limit를 활용해서 한 페이지에 최대 10개 보여주는 것으로.
  //5.로그인 후 작성자의 이름을 가지고 와서 create메소드에 함께 넘겨줘야 함.
  //->넘겨준 후 write.php에서는 히든input태그를 만든 후 value값에 작성자 이름을 담아줌.
  //6.회원
  //-------------------------------------------------------------  
    public function index ()
    {
      //db의 tables에 모든 정보를 가져와서 키 벨류값 으로 table.php에 던져준다.
      $users = DB::table('tables')->get();
       return view('borads.table',compact('users'));

    }
    //게시글 작성하기 누르면 게시글을 작성 할 수 잇는 페이지로 넘기는 역할
    public function create ()
    {
        return view('borads.write');

    }
     //게시글 작성 후 디비에 저장을 하는 역할.
     //저장한 글은 위 index 메소드를 통해서 디비에 잇는 값을 불러와서 사용자에게 보여줌.
    public function store (Request $request)
    {
        $validated = $request->validate([
            'title' => 'required max:255',
            'date' => 'date_format:m/d/Y',
            'content' => 'required',
        ]);

        $Sign = Table::create(requset(['title','date','content']));
        return redirect('/tables/');
    }
 //user-id값을 가져와서 그 해당하는 게시물을 보여줌.
 //$table은 변수명이고, 앞에 Table모델을 받게 되면
 //suer-id값에 대한 row값 전체를 가져오는 역할을 한다고함.
    public function show(Table $table)
    {
        return view('borads.show',[
            'table' =>$table
        ]);
    }

    public function edit(Table $table)
    {
        return view('borads.edit', [
            'table' =>$table
        ]);
    }
    //update를 써야하는 것은 규칙
    public function update(Table $table)
    {
        $table->update([
            'title' => request('title'),
            'date' => request('date'),
            'content' => request('content')
        ]);
        return redirect('/tables/'.$table->id);
    }
    
    //삭제 역할
    public function destroy(Table $table)
    {
        $table->delete();
        return redirect('tables');
    }

}