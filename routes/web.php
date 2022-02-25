<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*...*/
Route::get('/', function () {
    return view('welcome');
});

//연습
Route::get('/tasks', 'TaskController@index');
Route::get('/tasks/create', 'TaskController@create');
Route::post('/tasks', 'TaskController@store');
Route::get('/tasks/{task}', 'TaskController@show');
Route::get('/tasks/{task}/edit', 'TaskController@edit');
Route::put('/tasks/{task}', 'TaskController@update');
Route::delete('/tasks/{task}', 'TaskController@destroy');
//------------------------------------------------------------------------------
//실전
//홈페이지 첫 페이지에서 회원가입을 누르게 되면 넘어가는 라우트
Route::get('/borads', 'SignController@index');
//홈페이지 첫 페이지에서 로그인을 누르게 되면 넘어가는 라우트
Route::get('/login', 'SignController@login');
//회원가입 페이지에서 사용자가 회원가입을 하게 되면 post로 넘겨주는 라우트
Route::post('/borads', 'SignController@store');
//회원가입 페이지에서 사용자가 회원가입을 하게 되면 post로 넘겨주는 라우트
Route::post('/login', 'SignController@find');
//로그아웃 기능 라우트
Route::get('/logout', 'SignController@logout');
//-----------------------------------------------------------------------------
//테이블
//테이블 라우트
Route::get('/tables', 'TableController@index');
//테이블 글쓰는 페이지
Route::get('/tables/create', 'TableController@create');
//글을 쓰고 테이블에 저장하는 라우트
Route::post('/tables', 'TableController@store');
//사용자가 게시글 내용을 클릭햇을때 해당 게시물의 내용을 보여주는 라우트
//{table}에 {{user->id}}값이 파라미터 값으로 넘어옴.
Route::get('/tables/{table}', 'TableController@show');
//사용자가 자신이 작성한 글을 보고 수정버튼을 클릭햇을 때 보여주는 라우트
Route::get('/tables/{table}/edit', 'TableController@edit');
//사용자가 게시글을 수정하고 나면 받아주는 라우트
Route::put('/tables/{table}', 'TableController@update');
//사용자가 게시글을 삭제하는 라우트
Route::delete('/tables/{table}', 'TableController@destroy');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('test',function(){
    return view('test');
});