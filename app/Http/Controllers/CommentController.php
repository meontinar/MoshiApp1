<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::all();
        return view('comments.index', ['comments' => $comments]);
    }

    public function create(){
        return view('comments.create');
    }

    public function store(Request $req){
        Comment::create([
            'content' => $req->content,
            'post_id' => $req->post_id
        ]);
        return redirect()->route('posts.show', [$req->post_id, 'comments' => Comment::all()]);
    }

    public function show(Comment $comment){
        return view('comments.show', ['comment' => $comment]);
    }

    public function edit(Comment $comment){
        return view('comments.edit', ['comment' => $comment]);
    }

    public function update(Request $request, Comment $comment){
        $comment->update([
            'content' => $request->content,
            'post_id' => $request->post_id
        ]);
        return redirect()->route('posts.show', [$comment->post_id]);
    }

    public function destroy(Comment $comment){
        $comment->delete();
        return redirect()->route('posts.show', [$comment->post_id]);
    }
}
