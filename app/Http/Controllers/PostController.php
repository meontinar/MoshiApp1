<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postsByCategory(Category $category){
        return view('posts.index', ['posts' => $category->posts, 'categories' => Category::all()]);
    }

    public function index(){
        $posts = Post::all();
        return view('posts.index', ['posts' =>$posts, 'categories' => Category::all()]);
    }

    public function create(){
        return view('posts.create', ['categories' => Category::all()]);
    }
    public function store(Request $req){
        Post::create([
            'title' => $req->title,
            'content' => $req->content,
            'category_id' => $req->category_id
        ]);
        return redirect()->route('posts.index');
    }
    public function show(Post $post){
        $comments = Comment::all();
        return view('posts.show', ['post' => $post, 'comments' => $comments]);
    }

    public function edit(Post $post){
        return view('posts.edit', ['post' => $post, 'categories' => Category::all()]);
    }

    public function update(Request $request, Post $post){
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('posts.index');
    }

        public function destroy(Post $post){
        $post->delete();
        return redirect()->route('posts.index', [$post->id]);
    }
}
