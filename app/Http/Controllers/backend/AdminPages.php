<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StaticPage;

class AdminPages extends Controller
{
	public function add(Request $request){
		$this->validate($request, ['name' => 'required', 'url' => 'required', 'description' => 'required','public'=>'required' ]);
		try {
			$page = new StaticPage();
			$page->name = $request->name;
			$page->url = $request->url;
			$page->description = $request->description;
			$page->publication = $request->public;
			$page->timestamps = false;
			$page->save();
			return redirect('/admin/staticpages')->with(['message' => 'The page was created']);
		} catch (\Exception $e) {
			return redirect('/admin/staticpages/add')->withErrors(['msg' => 'Sorry something went worng. Please try again.']);
		}
	}

	public function edit($id){
		$page = StaticPage::find($id);
		return view('admin.pages.add_edit',[
			'page' => $page
		]);
	}

	public function update(Request $request){

		$this->validate($request, ['name' => 'required', 'url' => 'required', 'description' => 'required','public'=>'required' ]);
		try {
			$page = StaticPage::find($request->id);
			$page->name = $request->name;
			$page->url = $request->url;
			$page->description = $request->description;
			$page->publication = $request->public;
			$page->timestamps = false;
			$page->save();
			return redirect('/admin/staticpages')->with(['message' => 'The page was updated']);
		} catch (\Exception $e) {
			return redirect('/admin/staticpages')->withErrors(['msg' => 'Sorry something went worng. Please try again.']);
		}
	}

	public function delete($id){
		try {
			$page = StaticPage::find($id);
			$page->delete();
			return redirect('/admin/staticpages')->with(['message' => 'The page was deleted']);
		} catch (\Exception $e) {
			return redirect('/admin/staticpages')->withErrors(['msg' => 'Sorry something went worng. Please try again.']);
		}
	}

	public function show(){
		$pages = StaticPage::all();
		return view('admin.pages.all', [
			'pages' => $pages
		]);
	}
}
