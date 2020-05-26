<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

	public function __construct() {
		$this->middleware('guest:admin');
	}

    public function login(Request $request) {
    	$this->validate($request, [
    		$this->username() => 'required|string',
    		'password' => 'require|string',
    	]);

    	$credentials = [
    		'email' => $request->email,
    		'password' => $request->password
    	];

    	$authOK = Auth::guard('admin')->attempt($credentials, $request->remember);    	
    }

    public function index() {
    	return view("auth.admin-login");
    }
}
