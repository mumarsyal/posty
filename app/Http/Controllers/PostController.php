<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
	public function index()
	{
		$posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(20);
		return view('posts.index', ['posts' => $posts]);
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'body' => 'required'
		]);

		$request->user()->posts()->create($request->only('body'));

		return back();
	}

	public function detail(Post $post)
	{
		return view('posts.detail', ['post' => $post]);
	}

	public function destroy(Post $post)
	{
		$this->authorize('delete', $post);

		$post->delete();

		return back();
	}

	public function like(Request $request, Post $post)
	{
		$post->likes()->create([
			'user_id' => $request->user()->id
		]);

		return back();
	}

	public function unlike(Request $request, Post $post)
	{
		$request->user()->likes()->where('post_id', $post->id)->delete();

		return back();
	}
}
