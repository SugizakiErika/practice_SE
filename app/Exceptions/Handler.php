<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Session\TokenMismatchException;//セッション切れた時用追加

use App\Http\Requests\PostRequest;
use Session;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    
    //追加
    public function render($request, Throwable $exception)
    {
        //トークンの不一致を検出した場合、元のページにリダイレクトする
        if($exception instanceof TokenMismatchException)
        {
            //dd($request);
            //return back()->withInput();

            return redirect()->back()->withInput($request->input())->with('error','セッションが切れました。再度お試しください。');
            //withInput:ユーザーが新しい場所にリダイレクトする前にRedirectResposeインスタンスが提供する
            //withInputメソッドを使用して現在のリクエストの入力データをセッションへ一時保存する
            //入力をセッションへ一時保存すると次のリクエスト中に簡単に取得可能
        }
        
        return parent::render($request,$exception);
    }
}
