<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller {
    public function __construct () {
    	$this->middleware('auth');
    }

    public function index () {
    	return view('user.profile');
    }

    public function choosePlan () {
    	return view('user.choose-plan');
    }
}
