<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Post;
use Mail;
use Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function services(){
    	return view('services');
    }

    public function postContact(Request $request){
        $this->validate($request, [
            'name_inq' => 'required',
            'company_inq' => 'required',
            'contact_inq' => 'required',
            'inq' => 'required']);

        $data = array(
            'name_inq' => $request->name_inq,
            'company_inq' => $request->company_inq,
            'contact_inq' => $request->contact_inq,
            'inq' => $request->inq
            );

        Mail::send('auth.emails.inq_mails', $data, function($message) use ($data){
            $message->from('website@cleanleaf.com.ph');
            $message->to('paulgb.cleanleaf@gmail.com');
        });

    }

}
