<!--MVCのVのViewの部分-->
<!--サイトの見た目を扱う、サイトを表示する-->
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
                    <a href="/posts/{{ $post->id }}"><h2 class='title'>{{ $post->title }}"</h2></a>
                <p class='body'>{{ $post->body }}</p>
            </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links()}}
        </div>
    </body>
</html>