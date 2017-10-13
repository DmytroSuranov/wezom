<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class PostController extends Controller
{
    public function getPostByURL($category_url, $url){
		$category = Category::where('url','=',$category_url)->first();
	    $post = Post::where('url','=',$url)->first();
	    if(!$category || !$post)
		    return abort(404);
	    return view('post',[
		    'category' => $category,
		    'post' => $post
	    ]);
    }
}
