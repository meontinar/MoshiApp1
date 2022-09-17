<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>The post</title>
</head>
<body>
    <div>
        <a href="{{route('posts.index')}}">Go to index page</a>
    </div>

    <h3>{{$post->title}}</h3>
    <p>{{$post->content}}</p>

    <a href="{{route('posts.edit', $post->id)}}">Edit</a>

</body>
</html>
