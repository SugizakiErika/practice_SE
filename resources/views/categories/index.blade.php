<!--MVCのVのViewの部分-->
<!--サイトの見た目を扱う、サイトを表示する-->
<!--タイトルと内容全部表示しているところ-->
<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https:fonts.googlepis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <div class='posts'>
            @foreach ($posts as $post)
            <!--Controllerから受け取った変数は｛｛＄変数名｝｝という形で受け取れる-->
            <!--foreach文:$postsの要素を順番に取り出し、Spostに格納する-->
            <div class='post'>
                <h2 class='title'>
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                <a href="/posts/{{ $post->id }}"><h2 class='title'>{{ $post->title }}</h2></a>
                <p class='body'>{{ $post->body }}</p>
                <!--削除するための追記↓-->
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                </form>
          
            @endforeach
        </div>
        <div class="footer">
            <a href="{{ route('create') }}">create</a>
        </div>
        <div class='paginate'>
            {{ $posts->links()}}
        </div>
          </div>
        <!--↓バッククオートで囲む削除用の追記javaScript-->
        <script>
            function deletePost(id) {
                'use strict'
                
                if(confirm('削除すると復元できません。　\n本当に削除しますか？')){
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>