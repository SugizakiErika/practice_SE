<!--ブログ投稿編集画面-->
<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https:fonts.googlepis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
            <!--csrfトークンのセッション切れ用-->
            @if (session('app_error'))
                <div class="alert alert-danger" style="color:red">{{ session('app_error') }}</div>
                <pre><code>{{ var_dump(session()->get('_old_input')) }}</code></pre>
                <!--var_dump:指定した変数や配列に関してその型や値を含む構造化された情報を出力する-->    
            @endif
            <form action="/posts/{{ $post->id }}" method="POST">
                <!--@csrf-->
                @method('PUT')
                <div class='content__title'>
                    <h2>タイトル</h2>
                    <input type='text' name='post[title]' value="{{ old(('post.title'),$post->title) }}">
                    <!--oldの中身 第一引数：入力した値,第二引数：デフォルト値-->
                </div>
                <div class='content__body'>
                    <h2>本文</h2>
                    <input type='text' size="60" name='post[body]' value="{{ old(('post.body'),$post->body) }}">
                </div>
                <input type="submit" value="保存">
            </form>
        </div>

    </body>
</html>
    