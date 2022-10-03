<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>All posts</title>
</head>
<body>
    @foreach($categories as $cat)
        <a href="{{route('posts.category', $cat->id)}}">{{$cat->name}}</a>
    @endforeach
    <br>
    <a class="btn btn-outline-primary" href="{{route('posts.create')}}">Go to create page</a><br>

    @foreach($posts as $post)
        <a href="{{route('posts.show', $post->id)}}"><h3>{{$post->title}}</h3></a>
        <p>{{$post->content}}</p>

        <form action="{{route('posts.destroy',  $post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    @endforeach

</body>
</html>
