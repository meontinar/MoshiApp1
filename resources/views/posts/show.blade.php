<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Show a post</title>
</head>
<a href="{{route('posts.index')}}">Go to index page</a>
<h3>{{$post->title}}</h3>
<p>{{$post->content}}</p>

<a href="{{route('posts.edit', $post->id)}}">Edit</a><br><br>
<form action="{{route('comments.store', $post->id)}}" method="post">
    @csrf
    <input type="text" name="content"><br>
    <input type="hidden" name="post_id" value="{{$post->id}}">
    <button type="submit">Send comment</button>
</form>

@foreach($comments as $comment)
    @if($comment->post_id==$post->id)
        <p>{{$comment->content}}</p>
        <a href="{{route('comments.edit', $comment->id)}}">Edit</a>
        <form action="{{route('comments.destroy', $comment->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete comment</button>
        </form>
        @endif
        @endforeach
        </body>
</html>
