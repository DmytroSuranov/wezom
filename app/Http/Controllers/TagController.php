<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Post;

class TagController extends Controller
{
	public function getTagPageByURL($url){
		$tag = Tag::where('url', '=', $url)->first();
		if(!$tag)
			return abort(404);
		$posts = Post::getPostsByTag($tag->name);
		return view('tag',[
			'posts' => $posts,
			'tag' => $tag
		]);

	}

}
