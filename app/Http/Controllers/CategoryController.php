<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function getCategoryPageByURL($url){
		$category = Category::where('url', '=', $url)->first();
		if(!$category)
			return abort(404);

        $posts = $category->publicPosts()->get();
	    return view('category',[
		    'category' => $category,
		    'posts' => $posts
	    ]);

    }
}
