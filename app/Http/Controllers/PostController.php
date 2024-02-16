<?php
//MVCのC(Controller)の部分
//処理の割り振りを行う(データ処理の命令をModelにやデータをViewに渡すなど)
//routeで定義されたHTTPリクエスト(URL)の処理を記載する
//php artisan make:controller PostControllerで作れる
//コードはなるべく少なくする用に記載する
//全然関係ないけどわからなくなる時用
//インスタンス:クラス(テンプレート)に実際にデータ入れたやつ
//プロパティ:クラス内で定義された変数のこと

namespace App\Http\Controllers; //どこにあるか

use App\Http\Requests\PostRequest;
use App\Models\Post;


class PostController extends Controller //Controllerを継承する
{
    
 /**
  * Post一覧を表示する
  * 
  * @param Post Postモデル
  * @return array Postモデル
  */
    public function index(Post $post)
    //インポートしたPostをインスタンス化して$postとして使用。
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    //view ('post.index')とは
    //viewディレクトリ配下のpostディレクトリにあるindex.blade.phpを
    //勝手に返してくれるという意味
    //withメソッド:view(index.blade.php)にControllerで取得した変数を配列で渡す
    //変数名=>値という形でviewにデータを渡す
    //view側ではこのとき変数名'posts'で値を参照することができる
    //getPagonateByLimit():Post(Model)での処理
    }
    
    /**
     * 特定のIDのpostを表示する
     * 
     * @params Object Post //引数の$postはid=1のPostインスタンス
     * @return Response post view
     */
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
    
    /**
     * ブログ投稿作成画面を表示する
     * 
     * @return view
     */
    public function create()
    {
        return view('posts.create');
    }
    
    /**
     * ブログの投稿を登録する
     * 
     * @return view
     */
     public function store(Post $post,PostRequest $request)
     //store関数の引数にPostRequestクラスを指定することで
     //インスタンス化されるタイミングでPostRequest.phpのrulesメソッドで
     //バリデーションが行われ、そこでエラーが出たら、下記は実行されず、エラー処理が実行される。
     {
         //dd($request->all);中身がどうなってるか確認用
         
         $input = $request['post'];
         //$request['post']:create.blade.phpのpost[~]と書いてあるものだけを
         //取得して$inputに格納する(各テキストボックスの入力された内容のみ格納している)
         
         $post->fill($input)->save();
         //fill:Postインスタンスの複数のプロパティを一気にセットする(カタカナの説明はｳｴﾆｱﾙﾖ)
         //save:MysqlへのINSERT文を実行し、DBへデータを追加する(Laravelだから可能なだけ)
         //fillを使う場合はPostModel(Post.php)側にfillableの記載が必ず必要なので注意！
         //fillを使わないで書くなら↓
         //$post->title = $input["title"];
         //$post->body = $input["body"];
         //$post->save();
         
         return redirect('/posts/' .$post->id);
         //リダイレクトする：サイトやページなどを新しいURLに変更した際に
         //                  自動的に転送する仕組み
         //$post->save()が完了した時点でPostインスタンスにはIDが付与され、
         //プロパティとしても保持しているので今回保存したpostのIDに
         //リダイレクト可能なので上記のような記載が可能となる
     }
}
