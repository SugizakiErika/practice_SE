<?php
//routeを扱う
//ブラウザから任意のURLのアクセスがあった場合に
//どのControllerの処理を動かすか決める役割
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', [PostController::class, 'index'])->name('index');
//Route:Laravel既存機能のRouteファサードを使う
//get:HTTPメソッドを指定する、データをもらうアクセス
//'/':任意のURLを指定する
//PostController::class,'index':作ったControllerのindex関数を実行する
//つまり、'/'にアクセスしたらPostControllerのindex関数を実行するということ


//下のshowメソッドよりも先に記載しないと{post}にcreateが入ってバグるので注意
Route::get('/posts/create',[PostController::class,'create'])->name('create');


//'/post/{対象のDataID}'にアクセスしたら、PostControllerのshowメソッドを実行する
Route::get('/posts/{post}',[PostController::class,'show'])->name('show');


//DBへの登録用ルーティング
//post:データを渡すアクセスで新規作成やデータの削除、バッチ処理開始を行う時に使う
Route::post('/posts',[PostController::class,'store']);

//ブログ投稿編集画面表示用
Route::get('/posts/{post}/edit',[PostController::class,'edit']);

//ブログ投稿編集実行
//put:データを渡すアクセスで既存データを置き換えるときに使う
Route::put('/posts/{post}',[PostController::class,'update']);

//ブログ削除用
Route::delete('/posts/{post}', [PostController::class,'delete']);

//過去の練習用↓
//Route::get('/posts', [PostController::class, 'index']);
//Route::get('/', function () {
  //  return view('posts.index');
//});