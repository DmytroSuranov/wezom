<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Post extends Model
{
	public $table = 'posts';
	public $primaryKey = 'id';

	public function category(){
		return $this->belongsTo('App\Category', 'id_category');
	}

	public function comments(){
		return $this->hasMany('App\Comment', 'id_post');
	}

	public static function getPostsByTag($tag_name){
		$posts = Post::all();
		$posts_with_tag = array();
		foreach($posts as $post){
			$array_of_tags = explode(',',$post->tags);
			if(!empty($array_of_tags[0]))
				if(in_array($tag_name,$array_of_tags))
					$posts_with_tag[] = $post;
		}
		return $posts_with_tag;
	}

}
