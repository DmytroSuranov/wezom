<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use App\Tag;

class AdminPost extends Controller
{
	public function add(Request $request){
		$this->validate($request, ['name' => 'required', 'url' => 'required', 'description' => 'required','public'=>'required','id_category'=>'required','post_preview'=>'required' ]);
		try {
			$post = new Post;
			$post->name = $request->name;
			$post->url = $request->url;
			$post->description = $request->description;
			$post->publication = $request->public;
			$post->id_category = $request->id_category;
			$post->tags = $request->tags;
			$post->post_preview = $request->post_preview;
			$post->date_of_publication = date('Y-m-d');
			$post->timestamps = false;
			$post->save();
			return redirect('/admin/posts')->with(['message' => 'The post was created']);
		} catch (\Exception $e) {
			return redirect('/admin/posts/add')->withErrors(['msg' => 'Sorry something went worng. Please try again.']);
		}
	}

	public function edit($id){
		$post = Post::find($id);
		$categories = Category::all()->where('publication','=','yes');
		$tags = Tag::all()->where('publication','=','yes');
		return view('admin.post.add_edit',[
			'post' => $post,
			'tags' => $tags,
			'categories' => $categories
		]);
	}

	public function update(Request $request){
		$this->validate($request, ['name' => 'required', 'url' => 'required', 'description' => 'required','public'=>'required','id_category'=>'required','post_preview'=>'required' ]);
		try {
			$post = Post::find($request->id);
			$post->name = $request->name;
			$post->url = $request->url;
			$post->description = $request->description;
			$post->publication = $request->public;
			$post->id_category = $request->id_category;
			$post->tags = $request->tags;
			$post->post_preview = $request->post_preview;
			$post->date_of_publication = date('Y-m-d');
			$post->timestamps = false;
			$post->save();
			return redirect('/admin/posts')->with(['message' => 'The post was updated']);
		} catch (\Exception $e) {
			return redirect('/admin/posts')->withErrors(['msg' => 'Sorry something went worng. Please try again.']);
		}
	}

	public function delete($id){
		try {
			$post = Post::find($id);
			$post->delete();
			return redirect('/admin/posts')->with(['message' => 'The post was deleted']);
		} catch (\Exception $e) {
			return redirect('/admin/posts')->withErrors(['msg' => 'Sorry something went worng. Please try again.']);
		}
	}

	public function getAddPage(){
		$categories = Category::all()->where('publication','=','yes');
		$tags = Tag::all()->where('publication','=','yes');
		return view('admin.post.add_edit',[
			'categories' => $categories,
			'tags' => $tags
		]);

	}
	public function show(){
		$posts = Post::all();
		$categories = Category::all();
		return view('admin.post.all', [
			'posts' => $posts,
			'categories' => $categories
		]);
	}
}
