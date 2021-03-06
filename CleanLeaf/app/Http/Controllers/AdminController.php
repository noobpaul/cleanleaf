<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\JobOrder;
use App\Notifications;
use Image;
use PDF;
use Mail;

class AdminController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
		$this->middleware('admin', ['only' => ['adminRegisterView','adminRegisterPost','adminJobOrderPdf','adminJobOrderAccept','adminJobOrderReject']]);
	}

    public function admin($username) {
    	$user = User::where('username', $username)->first();
    	return view('auth.admin.index')->with('user',$user);
    }

    public function adminRegisterView($username) {
    	$user = User::where('username', $username)->first();
    	return view('auth.admin.register')->with('user',$user);
    }

    public function adminRegisterPost(Request $request, $username) {
    	$user = User::where('username', $username)->first();
    	$this->validate($request, [
    		'name' => 'required|max:255',
            'role' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
    		]);

        $password = str_random(6);

    	$new_user = new User;
        $new_user->name = $request->name;
        $new_user->email = $request->email;
        $new_user->role = $request->role;
        $new_user->password = bcrypt($password);
        $new_user->save();

        $username = strtolower(str_replace(' ', '', $request->name)) . $new_user->id;
    	$saved_user = User::find($new_user->id);
        $saved_user->username = $username;
        $saved_user->update();

        Mail::send('partials.mails.account', ['user' => $new_user, 'username' => $username, 'password' => $password], function ($message) use ($user,$new_user)
        {
            $message->from($user->email, $user->name);
            $message->to($new_user->email);
        });

    	return redirect()->route('adminRegisterView',$username)->with('user',$user);
    }

    public function adminJobOrder($username) {
    	$user = User::where('username', $username)->first();
    	$job_orders = JobOrder::latest()->get();
    	return view('auth.admin.job_order')->with('user',$user)->with('job_orders',$job_orders);
    }

    public function adminJobOrderPost(Request $request, $id) {
    	$user = User::find($id);
    	$this->validate($request, [
    		'name' => 'required|max:255',
            'client_name' => 'required|max:255',
            'address' => 'required|max:255',
            'contact_number' => 'required|max:11',
            'particular' => 'required',
            'remarks' => 'required',
    		]);

    	$admins = User::where('role','admin')->get();

    	$job_order = new JobOrder;
    	$job_order->user_id = $user->id;
    	$job_order->name = $request->name;
    	$job_order->client_name = $request->client_name;
    	$job_order->address = $request->address;
    	$job_order->contact_number = $request->contact_number;
    	$job_order->particular = $request->particular;
    	$job_order->remarks = $request->remarks;
    	$job_order->save();

    	Mail::send('partials.mails.staff', ['job_order' => $job_order], function ($message) use ($user,$admins)
        {
            $message->from($user->email, $user->name);
            foreach ($admins as $admin) {
	            $message->to($admin->email);
            }

        });

        foreach ($admins as $admin) {
            $notif = new Notifications;
            $notif->user_id = $admin->id;
            $notif->status = 1;
            $notif->save();
        }

    	return redirect()->route('adminJobOrder',$user->username)->with('user',$user);
    }

    public function adminJobOrderPdf($id) {
    	$job_order = JobOrder::find($id);
    	$pdf = PDF::loadView('partials.pdf.job_order_pdf',['job_order' => $job_order]);
    	return $pdf->stream('job_order.pdf');
    }

    public function adminJobOrderAccept($username, $id) {
    	$user = User::where('username', $username)->first();

    	$job_order = JobOrder::find($id);
    	$job_order->status = true;
    	$job_order->update();

    	$send_to = $job_order->user;

    	Mail::send('partials.mails.status', ['job_order' => $job_order, 'user' => $user ], function ($message) use ($user,$send_to)
        {
            $message->from($user->email, $user->name);
            $message->to($send_to->email);

        });

    	return redirect()->route('adminJobOrder',$user->username)->with('user',$user);
    }

    public function adminJobOrderReject($username, $id) {
    	$user = User::where('username', $username)->first();
    	
    	$job_order = JobOrder::find($id);
    	$job_order->status = false;
    	$job_order->update();

    	$send_to = $job_order->user;

    	Mail::send('partials.mails.status', ['job_order' => $job_order, 'user' => $user ], function ($message) use ($user,$send_to)
        {
            $message->from($user->email, $user->name);
            $message->to($send_to->email);

        });

    	return redirect()->route('adminJobOrder',$user->username)->with('user',$user);
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
    		'old_password' => 'required|min:6|max:255|old_password:' . $user->password,
    		'password' => 'required|min:6|max:255|confirmed',
    		]);


    		$user->password = bcrypt($request->password);
    		$user->update();

	    	return redirect()->route('adminSettings',$user->username);
    }

    public function adminImage(Request $request, $id) {
    	$user = User::find($id);
    	$this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png,gif'
	        ]);

    	$fileName = $user->id . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();

        if ($request->hasFile('image')) {
            Image::make($request->file('image'))->resize(300, 300)->save(public_path('img/uploads/' . $fileName));
            $user->image = 'img/uploads/' . $fileName;
            $user->update();

	    	return redirect()->route('adminSettings',$user->username);
        }
    }
}
