<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Edit comment</title>
</head>
<body>
<a href="{{route('posts.index')}}">Go to index page</a>

<form action="{{route('comments.update', $comment->id)}}" method="post">
    @csrf
    @method('put')
    Comment: <textarea name="content" cols="30" rows="10">{{$comment->content}}</textarea>
    <input type="hidden" name="post_id" value="{{$comment->post_id}}">
    <button type="submit">Update comment</button>
</form>
</body>
</html>
