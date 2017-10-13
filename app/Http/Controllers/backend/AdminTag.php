<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;

class AdminTag extends Controller
{

	public function add(Request $request){
		$this->validate($request, ['name' => 'required', 'url' => 'required', 'public'=>'required' ]);
		try {
			$tag = new Tag;
			$tag->name = $request->name;
			$tag->url = $request->url;
			$tag->publication = $request->public;
			$tag->timestamps = false;
			$tag->save();
			return redirect('/admin/tags')->with(['message' => 'The tag was created']);
		} catch (\Exception $e) {
			return redirect('/admin/tags/add')->withErrors(['msg' => 'Sorry something went worng. Please try again.']);
		}
	}

	public function edit($id){
		$tag = Tag::find($id);
		return view('admin.tag.add_edit',[
			'tag' => $tag
		]);
	}

	public function update(Request $request){

		$this->validate($request, ['name' => 'required', 'url' => 'required', 'public'=>'required' ]);
		try {
			$tag = Tag::find($request->id);
			$tag->name = $request->name;
			$tag->url = $request->url;
			$tag->publication = $request->public;
			$tag->timestamps = false;
			$tag->save();
			return redirect('/admin/tags')->with(['message' => 'The tag was updated']);
		} catch (\Exception $e) {
			return redirect('/admin/tags')->withErrors(['msg' => 'Sorry something went worng. Please try again.']);
		}
	}

	public function delete($id){
		try {
			$tag = Tag::find($id);
			$tag->delete();
			return redirect('/admin/tags')->with(['message' => 'The tag was deleted']);
		} catch (\Exception $e) {
			return redirect('/admin/tags')->withErrors(['msg' => 'Sorry something went worng. Please try again.']);
		}
	}

	public function show(){
		$tags = Tag::all();
		return view('admin.tag.all', [
			'tags' => $tags
		]);
	}
}
