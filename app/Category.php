<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
	public $table = 'categories';
	public $primaryKey = 'id';


	public function posts(){
		return $this->hasMany('App\Post', 'id_category');
	}

	public function publicPosts() {
		return $this->posts()->where('publication','=', 'yes');
	}
}
