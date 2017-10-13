<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
	public function add(Request $request){
		$this->validate($request, ['id_user' => 'required', 'id_post' => 'required', 'comment' => 'required']);
		try {
			$comment = new Comment();
			$comment->id_user = $request->id_user;
			$comment->id_post = $request->id_post;
			$comment->body = $request->comment;
			$comment->save();
			return back()->with(['message' => 'Комментарий успешно добавлен.']);
		} catch (\Exception $e) {
			return back()->with(['message' => 'Комментарий не был добавлен по каким-то причинам.']);
		}
	}
}
