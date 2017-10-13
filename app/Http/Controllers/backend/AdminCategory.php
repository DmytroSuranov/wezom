<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class AdminCategory extends Controller
{

	public function add(Request $request){
		$this->validate($request, ['name' => 'required', 'url' => 'required', 'description' => 'required','public'=>'required' ]);
		try {
			$category = new Category;
			$category->name = $request->name;
			$category->url = $request->url;
			$category->description = $request->description;
			$category->publication = $request->public;
			$category->date_of_publication = date('Y-m-d');
			$category->timestamps = false;
			$category->save();
			return redirect('/admin/categories')->with(['message' => 'The category was created']);
		} catch (\Exception $e) {
			return redirect('/admin/categories/add')->withErrors(['msg' => 'Sorry something went worng. Please try again.']);
		}


	}

	public function edit($id){
		$category = Category::find($id);
		return view('admin.category.add_edit',[
			'category' => $category
		]);
	}

	public function update(Request $request){

		$this->validate($request, ['name' => 'required', 'url' => 'required', 'description' => 'required','public'=>'required' ]);
		try {
			$category = Category::find($request->id);
			$category->name = $request->name;
			$category->url = $request->url;
			$category->description = $request->description;
			$category->publication = $request->public;
			$category->date_of_publication = date('Y-m-d');
			$category->timestamps = false;
			$category->save();
			return redirect('/admin/categories')->with(['message' => 'The category was updated']);
		} catch (\Exception $e) {
			return redirect('/admin/categories')->withErrors(['msg' => 'Sorry something went worng. Please try again.']);
		}
	}

	public function delete($id){
		try {
			$category = Category::find($id);
			$category->delete();
			return redirect('/admin/categories')->with(['message' => 'The category was deleted']);
		} catch (\Exception $e) {
			return redirect('/admin/categories')->withErrors(['msg' => 'Sorry something went worng. Please try again.']);
		}
	}

	public function show(){
		$categories = Category::all();
		return view('admin.category.all', [
			'categories' => $categories
		]);
    }
}
