<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class AdminController extends Controller
{
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
}
