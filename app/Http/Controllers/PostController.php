<?php
//MVCのC(Controller)の部分
//処理の割り振りを行う(データ処理の命令をModelにやデータをViewに渡すなど)
//routeで定義されたHTTPリクエスト(URL)の処理を記載する
//php artisan make:controller PostControllerで作れる
//コードはなるべく少なくする用に記載する

namespace App\Http\Controllers; //どこにあるか

use Illuminate\Http\Request;
use App\Models\Post;

/**
 * 
 * Post一覧を表示する
 * 
 * @param Post Postモデル
 * @return array Postモデル
 * 
 */

class PostController extends Controller //Controllerを継承する
{
    public function index(Post $post)
    //インポートしたPostをインスタンス化して$postとして使用。
    {
    return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    //view ('post.index')とは
    //viewディレクトリ配下のpostディレクトリにあるindex.blade.phpを
    //勝手に返してくれるという意味
    //withメソッド:view(index.blade.php)にControllerで取得した変数を渡す
    //変数名=>値という形でviewにデータを渡す
    //view側ではこのとき変数名'$post'で値を参照することができる
    //getPagonateByLimit():Post(Model)での処理
    }
}
