<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Image;

class AdminController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
		// $this->middleware('admin', ['only' => ['']]);
	}

    public function admin($username) {
    	$user = User::where('username', $username)->first();
    	return view('auth.admin.index')->with('user',$user);
    }

    public function adminSettings($username) {
    	$user = User::where('username', $username)->first();
    	return view('auth.admin.settings')->with('user',$user);
    }

    public function adminSettingsUpdate(Request $request, $id) {
    	$user = User::find($id);
    	$this->validate($request,[
    		'name' => 'required|max:255|unique:users,name,' . $user->id,
    		'username' => 'required|max:255|unique:users,username,' . $user->id,
    		'email' => 'required|email|max:255|unique:users,email,' . $user->id
    		]);

    	$user->name = $request->name;
    	$user->username = $request->username;
    	$user->email = $request->email;
    	$user->update();

    	return redirect()->route('adminSettings',$user->username);
    }

    public function adminPasswordUpdate(Request $request, $id) {
    	$user = User::find($id);
    	$this->validate($request,[
    		'current_pw' => 'required|min:6|max:255',
    		'new_pw' => 'required|min:6|max:255',
    		'confirm_pw' => 'required|min:6|max:255',
    		]);

    	if ($request->new_pw == $request->confirm_pw) {
	    	if(\Hash::check($request->current_pw,$user->password)) {
	    		$user->password = bcrypt($request->new_pw);
	    		$user->update();

		    	return redirect()->route('adminSettings',$user->username);
	    	}
	    	else {
	    		return 'invalid current password!';
	    	}
    	}
    	else {
    		return 'confirmation password does not match!';
    	}
    }

    public function adminImage(Request $request, $id) {
    	$user = User::find($id);
    	$this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png,gif'
	        ]);

    	$fileName = $user->id . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();

        if ($request->hasFile('image')) {
            Image::make($request->file('image'))->resize(300, 300)->save(public_path('img/' . $fileName));
            $user->image = 'img/' . $fileName;
            $user->update();

	    	return redirect()->route('adminSettings',$user->username);
        }
    }
}
