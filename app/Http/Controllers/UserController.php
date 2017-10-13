<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class UserController extends Controller
{
    public function getUserPage(){
		$current_user = \Auth::user();
	    return view('my-account',[
		    'current_user' => $current_user
	    ]);
    }

	public function saveUserData(Request $request){
		$this->validate($request, ['name' => 'required']);
		try {
			$user = User::find($request->id_user);
			$user->name = $request->name;
			if($request->password !== null){
				$user->password = \Hash::make($request->password);
			}
			$user->save();
			return redirect('/my-account')->with(['message' => 'Данные были обновлены']);
		} catch (\Exception $e) {
			return redirect('/my-account')->with(['message' => 'Данные не были обновлены']);
		}
	}
}
