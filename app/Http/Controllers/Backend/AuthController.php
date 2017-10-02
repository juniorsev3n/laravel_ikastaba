<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Auth;

class AuthController extends Controller
{
    //

    public function index()
    {

    }

    public function getLogin()
    {
    	return view('backend.login');
    }

    public function postLogin(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required',
    		'password' => 'required'
    		]);
        $check = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if($check && Auth::user()->isAdmin())
        {
            return redirect()->intended('admin/dashboard');
        }

        return redirect()->back()->with('message', 'You cant sign in')->withInput();
    }

}
