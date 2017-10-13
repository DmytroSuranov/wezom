<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class Comment extends Model
{
	public $table = 'comments';
	public $primaryKey = 'id';


	public function post(){
		return $this->belongsTo('App\Post', 'id_post');
	}

	public function user(){
		return $this->belongsTo('App\User', 'id_user');
	}
}
