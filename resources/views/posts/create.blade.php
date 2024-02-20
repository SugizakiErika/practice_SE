<!DOCTYPE HTML>
<!--app.getLocale:ユーザーの言語環境を取得する-->
<!--str_replace:文字列を置換する-->
<!--構文：str_replace（$検索文字列,$置換後文字列,$検索対象文字列[,int &$count]）-->
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- ↓ ページ上部に表示されるやつ-->
        <title>Blog</title>
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/posts" method="POST">
            <!--@csrf:CSRFトークンフィールドでセキュリティ驚異防止に必ず記載する-->
            <!--formタグの内側に記載する-->
            @csrf
            <div class="title">
                <h2>Title</h2>
                <!-- ↓ 改行なし、選択肢がないテキストボックス-->
                <!--placeholder:テキストボックス内に記載されている文字-->
                <!--｛｛old（'post.title'）｝｝:エラーで入力済みの内容が消えないように-->
                <!--直前の内容を入れた状態にする-->
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                <!-- ↓テキストボックスの内容に対してエラーがあった場合に-->
                <!--何の理由でエラーが起きているか画面に表示する -->
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <h2>Body</h2>
                <!-- ↓ 改行が入力可能、選択肢がないテキストボックス-->
                <textarea name="post[body]" placeholder="今日も一日お疲れ様でした。">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{  $errors->first('post.body') }}</p>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="back">
            [<a href="{{ route('index') }}">back</a>]
        </div>
    </body>
</html>